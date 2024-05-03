<template>
  <div class="loading-container" v-if="loadingVisible">
    <div class="loader">
      <span>C</span>
      <span>A</span>
      <span>B</span>
      <span>A</span>
      <span>L</span>
      <span>&nbsp;&nbsp;</span>
      <span>M</span>
      <span>O</span>
      <span>B</span>
      <span>I</span>
      <span>L</span>
      <span>E</span>
    </div>
  </div>
  <!-- <div class="barPC" v-if="screenWidth > 900"> -->
  <div class="barPC">
    <div class="menu">
      <div class="logo"><img src="/img/gameMall/MLogo.png" /></div>
      <ul class="menuList" v-if="screenWidth > 900">
        <button class="cardValue" @click="popBVisable(0)">儲值教學​</button>
        <button class="noticeValue" @click="popBVisable(1)">使用說明​</button>
        <button
          class="login"
          @click="popUIDVisable()"
          v-if="accountData.char == null || accountData.char == 'null'"
        >
          登入帳號
        </button>
        <li
          class="GameUID"
          v-if="accountData.char !== null && accountData.char !== 'null'"
          @mouseover="toggleUIDOpen(true)"
          @mouseleave="toggleUIDOpen(false)"
        >
          <span>{{ accountData.char }}</span>
          <ul class="UIDOpen" v-if="UIDOpen">
            <li @click="changeUID()">切換帳號</li>
            <li @click="changeChar()">切換角色</li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <div class="barM" v-if="screenWidth <= 900" @click="menuShow()">
    <div class="spanBox" :class="{ active: menuM }">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <ul class="menuM" v-if="screenWidth <= 900 && menuM == true">
    <button
      class="login"
      @click="popUIDVisable()"
      v-if="accountData.char == null || accountData.char == 'null'"
    >
      登入帳號
    </button>
    <li
      class="GameUID"
      v-if="accountData.char !== null && accountData.char !== 'null'"
      @click="toggleUIDOpen()"
    >
      <span>{{ accountData.char }}</span>
      <ul class="UIDOpen" v-if="UIDOpen">
        <li @click="changeUID()">切換帳號</li>
        <li @click="changeChar()">切換角色</li>
      </ul>
    </li>
    <button class="cardValue" @click="popBVisable(0)">儲值教學​</button>
    <button class="noticeValue" @click="popBVisable(1)">使用說明​</button>
  </ul>

  <!-- UID中跳窗 -->
  <div class="popUID" v-if="popUID.visable">
    <div class="mask" @click="popUIDVisable()"></div>
    <div class="popBg">
      <div class="title">登入帳號</div>
      <div class="deco1"></div>
      <div class="deco2"></div>
      <div class="inputBox">
        <div class="inputAccount">
          <label for="">帳號UID</label>
          <input
            type="text"
            name="account"
            id="account"
            v-model="popUID.GameUID"
            :disabled="popUID.disabled"
          />
          <button class="accountManual" type="button" @click="popBVisable(2)">
            ?
          </button>
        </div>
        <div class="text">{{ popUID.errorText }}​</div>
        <div class="selectServer" v-if="popUID.selectShow">
          <label>選擇伺服器</label>
          <select
            name="server"
            id="server"
            v-model="popUID.server"
            @change="serverCheck"
          >
            <option value="server01">冰珀星</option>
            <option value="server02">黑恆星</option>
          </select>
        </div>
        <div class="selectCharacter" v-if="popUID.selectShow">
          <label>選擇角色</label>
          <select
            name="character"
            id="character"
            v-model="popUID.char"
            @change="charCheck"
          >
            <option
              v-for="(character, index) in charList"
              :key="index"
              :value="character"
            >
              {{ character }}
            </option>
          </select>
        </div>
      </div>
      <button class="submit" @click="UIDSubmit()">
        {{ popUID.btnText }}
      </button>
    </div>
    <div class="x" @click="popUIDVisable()">x</div>
  </div>

  <!-- 大跳窗 -->
  <div class="popB" v-if="popBig.visable">
    <div class="mask" @click="popBVisable()"></div>
    <div class="popBg">
      <div class="title" v-if="popBig.titleType == 1">使用說明</div>
      <div class="title" v-if="popBig.titleType == 0">儲值教學</div>
      <div class="tabBox" v-if="popBig.titleType == 0">
        <button
          @click="tabChange('creditValue')"
          class="creditTab"
          :class="{ active: popBig.tabType == 'creditValue' }"
        >
          信用卡
        </button>
        <button
          @click="tabChange('myCardValue')"
          class="myCardTab"
          :class="{ active: popBig.tabType == 'myCardValue' }"
        >
          MyCard
        </button>
      </div>
      <div class="container">
        <div v-for="(value, key) in items" :key="key">
          <div class="title" v-if="key.includes('title')">
            {{ value }}
          </div>
          <div
            class="imgBox"
            v-if="key.includes('img')"
            :class="{
              rewardCbmImg: value.includes('rewardCbmImg1'),
            }"
          >
            <img :src="value" />
            <div class="t" v-if="value.includes('rewardCbmImg1')"></div>
          </div>
          <div class="text" v-if="key.includes('text')">
            {{ value }}
          </div>
          <div
            class="text"
            v-if="key.includes('Ul')"
            v-html="popBig.noticeValue.Ul"
          ></div>
        </div>
      </div>
    </div>
    <div class="x" @click="popBVisable()">X</div>
  </div>

  <!-- 中跳窗 -->
  <div class="popM" v-if="popMiddle.visable">
    <div class="mask" @click="popMVisable()"></div>
    <div class="popBg">
      <div class="deco1"></div>
      <div class="deco2"></div>
      <div class="left">
        <img :src="popMiddle.img" />
        <div class="name">
          {{ popMiddle.name }}<br />
          <span class="price">{{ popMiddle.price }}</span>
        </div>
        <!-- <div class="name">{{ popMiddle.name }}</div> -->
        <!-- <div class="price">{{ popMiddle.price }}</div> -->
      </div>
      <div class="right" v-html="popMiddle.text"></div>
      <div class="btnBox">
        <div class="creditCardBtn" @click="buy('credit', popMiddle.id)">
          信用卡支付
        </div>
        <div
          v-if="popMiddle.payment == 2"
          class="myCardBtn"
          @click="buy('mycard', popMiddle.id)"
        >
          MyCard
        </div>
      </div>
    </div>
    <div class="x" @click="popMVisable()">x</div>
  </div>

  <!-- 小跳窗 -->
  <div class="popS" v-if="popSmall.visable">
    <div class="mask" @click="popSVisable()"></div>
    <div class="popBg">
      <div class="deco1"></div>
      <div class="deco2"></div>
      <img :src="popSmall.img" />
      <div class="name">{{ popSmall.name }}</div>
      <div class="price">{{ popSmall.price }}</div>
      <div class="btnBox">
        <div class="creditCardBtn" @click="buy('credit', popSmall.id)">
          信用卡支付
        </div>
        <div
          v-if="popSmall.payment == 2"
          class="myCardBtn"
          @click="buy('mycard', popSmall.id)"
        >
          MyCard
        </div>
      </div>
    </div>
    <div class="x" @click="popSVisable()">x</div>
  </div>
  <!-- 空小跳窗 -->
  <div class="popE" v-if="popEmpty.visable">
    <div class="mask" @click="popEVisable()"></div>
    <div class="popBg">
      <div class="deco1"></div>
      <div class="deco2"></div>
      <div class="text" v-html="popEmpty.text"></div>
    </div>
    <div class="x" @click="popEVisable()">x</div>
  </div>

  <div class="fixBg"></div>
  <header class="header" id="header">
    <swiper
      :loop="true"
      :navigation="true"
      :modules="modules"
      :pagination="{ clickable: true }"
      :slides-per-view="slidesPerView"
      :space-between="0"
      :autoplay="{ delay: 2500, disableOnInteraction: false }"
      @slideChange="onSlideChange"
      class="mySwiper"
    >
      <swiper-slide
        class="swiperBox"
        v-for="(item, index) in img_url3"
        :key="index"
      >
        <a :href="item.url" :target="item.target">
          <!-- <img :src="item.img_url" /> -->
          <img src="/img/gameMall/imgTest.jpg" />
        </a>
      </swiper-slide>
    </swiper>
  </header>
  <div class="commoditySection">
    <div class="tabBox">
      <button
        @click="tabChange('diamondTab')"
        class="diamondTab"
        :class="{ active: commodityTab == 'diamondTab' }"
        v-if="item_tab.includes('normal')"
      >
        鑽石​
      </button>
      <button
        @click="tabChange('giftTab')"
        class="giftTab"
        :class="{ active: commodityTab == 'giftTab' }"
        v-if="item_tab.includes('gift')"
      >
        禮包​
      </button>
      <button
        @click="tabChange('promotionTab')"
        class="promotionTab"
        :class="{ active: commodityTab == 'promotionTab' }"
        v-if="item_tab.includes('sale')"
      >
        促銷​
      </button>
    </div>
    <div class="contain">
      <div v-for="(item, index) in filteredItemList" :key="index" class="box">
        <div class="deco1"></div>
        <div class="deco2"></div>
        <img
          :src="item.img"
          @click="
            popMVisable(
              item.id,
              item.img,
              item.item_name,
              item.ntd_price,
              item.content,
              item.payment
            )
          "
        />
        <div class="name">{{ item.item_name }}</div>
        <div class="price">{{ item.ntd_price }}</div>
        <button
          class="btnBuy"
          @click="
            popSVisable(
              item.id,
              item.img,
              item.item_name,
              item.ntd_price,
              item.payment
            )
          "
        >
          購買
        </button>
      </div>
    </div>
  </div>

  <footer class="section footer">
    <div class="footerbox_logo">
      <a href="https://www.digeam.com/index" target="_blank"
        ><img class="logo_digeam" src="/img/footer/digeam_logo.png"
      /></a>
      <img class="est_icon" src="/img/footer/est_icon.png" />
    </div>
    <div class="spec">
      <a href="https://www.digeam.com/terms" target="_blank">會員服務條款</a>
      <a href="https://www.digeam.com/terms2" target="_blank">隱私條款</a>
      <a href="https://www.digeam.com/cs" target="_blank">客服中心</a>
      <p class="Copyright">
        Copyright © ESTgames Corp. All rights reserved.​ 2023 Licensed and
        published for Taiwan, Hong Kong and Macau by DiGeam Co.,Ltd​ CABAL
        Online is a registered trademark of ESTgames Corp (and the logo of
        ESTgames).​
      </p>
    </div>
    <div class="classlavel">
      <img src="/img/footer/15_icon.png" alt="普遍級" />
      <ul>
        <li>本遊戲為免費使用，部分內容涉及暴力情節。​</li>
        <li>遊戲內另提供購買虛擬遊戲幣、物品等付費服務。</li>
        <li>請注意遊戲時間，避免沉迷。​</li>
        <li>本遊戲服務區域包含台灣、香港、澳門。​</li>
      </ul>
    </div>
  </footer>
</template>

<script>
let setting_api = "https://mobileapi.digeam.com/api/cbm_get_items"; //setting商品
let login_api = "https://mobileapi.digeam.com/api/cbm_search_user"; //帳號判定
let server_api = "https://mobileapi.digeam.com/api/cbm_search_characters"; //伺服器 查角色
let buy_api_mycard = "https://testmobileapi.digeam.com/api/myCard"; //myCard購買商品
let buy_api_funpoint = "https://testmobileapi.digeam.com/api/funPoint"; //funPoint購買商品
let buy_api = "";
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from "swiper/vue";

// Import Swiper styles
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
// import required modules
import { Autoplay, Navigation, Pagination } from "swiper/modules";

export default {
  components: {
    Swiper,
    SwiperSlide,
  },
  setup() {
    const onSlideChange = () => {};
    return {
      onSlideChange,
      modules: [Autoplay, Navigation, Pagination],
    };
  },
  data() {
    return {
      loadingVisible: false,
      slidesPerView: 3, //swiper預覽數量
      screenWidth: window.innerWidth, //螢幕寬度
      screenHeight: window.innerHeight, //螢幕高度
      menuM: false, //手機選單
      UIDOpen: false, //GameUID選單開

      // 要顯示的商品分類
      item_tab: ["normal", "gift", "sale"],
      // 商品分類tab目前選擇
      commodityTab: "diamondTab",

      item_lists: [
        {
          id: "1",
          item_name: "211鑽",
          img: "/img/gameMall/propImg.png",
          ntd_price: "1700TWD",
          content: "1233",
          item_cate: "normal",
          payment: 1,
        },
        {
          id: "2",
          item_name: "244鑽",
          img: "/img/gameMall/propImg.png",
          ntd_price: "1780TWD",
          content: "15555",
          item_cate: "sale",
        },
        {
          id: "3",
          item_name: "555鑽",
          img: "/img/gameMall/propImg.png",
          ntd_price: "1550TWD",
          content: "15555",
          item_cate: "gift",
        },
      ],
      img_url: [{}],
      img_url2: [
        {
          id: 1,
          file_name: "upload/bn/2ac91f3a1dcffb353ebbf3f3db41aae1.jpg",
          url: "#",
          type: "CMTW_M",
          sort: 1,
          status: "Y",
          created_at: "2024-04-19T07:56:27.000000Z",
          updated_at: "2024-04-19T07:56:27.000000Z",
          img_url:
            "http://192.168.0.43/upload/bn/2ac91f3a1dcffb353ebbf3f3db41aae1.jpg",
        },
        {
          id: 2,
          file_name: "upload/bn/6c79383ce8973a6280ca5f9304a53221.jpg",
          url: "#",
          type: "CMTW_M",
          sort: 2,
          status: "Y",
          created_at: "2024-04-19T07:56:49.000000Z",
          updated_at: "2024-04-19T07:56:49.000000Z",
          img_url:
            "http://192.168.0.43/upload/bn/6c79383ce8973a6280ca5f9304a53221.jpg",
        },
        {
          id: 3,
          file_name: "upload/bn/7ed4f5b5e3c4c650cfb59d349b34139f.jpg",
          url: "#",
          type: "CMTW_M",
          sort: 3,
          status: "Y",
          created_at: "2024-04-19T07:57:02.000000Z",
          updated_at: "2024-04-19T07:57:02.000000Z",
          img_url:
            "http://192.168.0.43/upload/bn/7ed4f5b5e3c4c650cfb59d349b34139f.jpg",
        },
      ],
      img_url3: [
        {
          href: "",
          target: "",
        },
        {
          href: "#",
          target: "_blank",
        },
        {
          href: "#",
          target: "_blank",
        },
        {
          href: "#",
          target: "_blank",
        },
        {
          href: "#",
          target: "_blank",
        },
        {
          href: "#",
          target: "_blank",
        },
      ],

      // 玩家UID當前資料
      accountData: {
        GameUID: "",
        server: 1,
        char: "",
      },
      charList: [], // api回傳 該伺服器 角色列表

      // 跳窗
      popBig: {
        visable: false,
        titleType: 0,
        tabType: "myCardValue",

        creditValue: {
          title1: "creditValue​",
          img1: "/img/20240403_joinAct/rewardCbImg1.png",
          text1:
            "坐騎服裝領取後可使用30天，包含特效屬性：致命傷害+9%及3個空插槽，不可交易。",
          img2: "/img/20240403_joinAct/rewardCbImg2.png",
          text2:
            "裝有Lv.4 GM祝福的聖水，使用後大幅提升角色能力值，持續1小時，不可交易。",
        },
        myCardValue: {
          title1: "myCardValue​",
          img1: "/img/20240403_joinAct/rewardCbImg1.png",
          text1:
            "坐騎服裝領取後可使用30天，包含特效屬性：致命傷害+9%及3個空插槽，不可交易。",
          img2: "/img/20240403_joinAct/rewardCbImg2.png",
          text2:
            "裝有Lv.4 GM祝福的聖水，使用後大幅提升角色能力值，持續1小時，不可交易。",
        },
        noticeValue: {
          Ul: `
                    <ul>
                        <li>【上市聯動活動】自即日起至《黑色契約Mobile》事前預約結束止。</li>
                        <li>每個掘夢網帳號僅能參加一次活動、領取一次獎勵。​</li>
                        <li>必須完成活動指定條件才符合獲獎資格。​</li>
                        <li>選擇《黑色契約Cabal Online》領獎伺服器，並點擊「立即領獎」後，將無法變更領獎伺服器，請多加注意。</li>
                        <li>《黑色契約Cabal Online》獎勵領取後，將發送至該帳號「活動背包」內。 ​</li>
                        <li>序號兌換：打開手遊/設定/資訊/登錄序號即可兌換。​</li>
                        <li>如遇不可抗拒之因素，掘夢網保有隨時修改活動辦法及獎項或中止本活動之權利。​</li>
                        <li>其他未規定事項，官方會依據狀況於遊戲網站或遊戲中公告或補充，參加者不得異議。</li>
                        <li>掘夢網保留活動最終修改、解釋權利。</li>
                    </ul>
                    `,
        },
        teachUIDSerch: {
          title1: "teachUIDSerch",
        },
      },
      popMiddle: {
        visable: false,
        img: "/img/gameMall/propImg.png",
        name: "1000鑽​",
        price: "100TWD",
        text: "2<br>32<br>32<br>32<br>32<br>32<br><br><br><br>3",
        payment: "",
      },
      popUID: {
        visable: false,
        GameUID: "",
        disabled: false, //input鎖
        errorText: "",
        selectShow: false, //預設false 藏
        btnText: "登入",
        server: 0,
        char: "",
      },
      popSmall: {
        visable: false,
        id: "",
        img: "",
        name: "",
        price: "",
        payment: "",
      },
      popEmpty: {
        visable: false,
        text: "",
      },

      // 防連點
      clickWall: 0,
    };
  },
  computed: {
    items() {
      if (this.popBig.titleType == 0) {
        if (this.popBig.tabType == "creditValue") {
          return this.popBig.creditValue;
        } else if (this.popBig.tabType == "myCardValue") {
          return this.popBig.myCardValue;
        }
      } else if (this.popBig.titleType == 1) {
        return this.popBig.noticeValue;
      } else if (this.popBig.titleType == 2) {
        return this.popBig.teachUIDSerch;
      }
    },
    filteredItemList() {
      if (this.commodityTab == "diamondTab") {
        return this.item_lists.filter((item) => item.item_cate == "normal");
      } else if (this.commodityTab == "giftTab") {
        return this.item_lists.filter((item) => item.item_cate == "gift");
      } else if (this.commodityTab == "promotionTab") {
        return this.item_lists.filter((item) => item.item_cate == "sale");
      } else {
        return [];
      }
    },
    sizeDetection() {
      return this.screenWidth / this.screenHeight > 1 ? 3 : 1;
    },
    slidesPerView() {
      return this.sizeDetection;
    },
  },
  methods: {
    // 帳號判定API
    async UIDSubmit() {
      if (this.popUID.btnText == "確認") {
        // 選角色.伺服 階段
        this.accountData.GameUID = this.popUID.GameUID;
        if (this.popUID.server == 0 || this.popUID.char == null) {
          this.popUID.errorText = "*請選擇伺服器、角色";
        } else {
          this.accountData.server = this.popUID.server;
          this.accountData.char = this.popUID.char;
          this.popUIDVisable();
        }
      } else {
        try {
          const response = await axios.post(login_api, {
            type: "login",
            GameUID: this.popUID.GameUID,
          });
          if (response.data.status == 1) {
            this.accountData.GameUID = this.popUID.GameUID;
            localStorage.setItem("GameUID", this.accountData.GameUID);

            //清空角色列、錯誤提示，鎖帳號input
            this.charList = "";
            this.popUID.errorText = "";
            this.popUID.disabled = true;

            this.popUID.selectShow = true;
            this.popUID.btnText = "確認";
          } else if (response.data.status == -99) {
            this.popUID.errorText = "*查無此帳號，請再次檢查您輸入的資料";
          }
        } catch (error) {
          console.error("Error:", error);
        }
      }
    },
    // server判定API
    async serverCheck() {
      console.log("選擇的服務器為", this.popUID.server);
      localStorage.setItem("server", this.popUID.server);
      this.accountData.server = this.popUID.server;

      try {
        const response = await axios.post(server_api, {
          type: "server",
          GameUID: this.accountData.GameUID,
          server_num: this.accountData.server,
        });
        if (response.data.status == 1) {
          this.charList = response.data.char_list;
        } else if (response.data.status == -99) {
          this.popEVisable("帳號錯誤，請重新整理畫面");
        } else if (response.data.status == -98) {
          this.popEVisable("伺服器錯誤，帳號錯誤，請重新整理畫面");
        }
      } catch (error) {
        console.error("Error:", error);
      }
    },

    async setting() {
      try {
        const response = await axios.post(setting_api, {
          type: "setting",
        });
        if (response.data.status == 1) {
          this.img_url = response.data.img_url;
          this.item_lists = response.data.item_lists;
          this.item_tab = response.data.item_tab;
          // this.accountData.GameUID = GameUID;
        } else if (response.data.status == -99) {
          console.error("Status is not 1:", response.data);
        }
      } catch (error) {
        console.error("Error:", error);
      }
    },

    // 購買道具
    async buy(type, id) {
      if (type == "mycard") {
        buy_api = buy_api_mycard;
      } else {
        buy_api = buy_api_funpoint;
      }
      console.log(buy_api);
      if (this.clickWall == 0) {
        this.clickWall = 1;
        if (
          this.accountData.GameUID !== null &&
          this.accountData.server !== "0" &&
          this.accountData.char !== null
        ) {
          try {
            const response = await axios.post(buy_api, {
              type: type,
              GameUID: this.accountData.GameUID,
              item_id: id,
              server_num: this.accountData.server,
              char: this.accountData.char,
              GameCode: "CMTW",
            });
            // form 表單發送
            if (response.data.status == 1 && type == "credit") {
              const url =
                "https://payment-stage.funpoint.com.tw/Cashier/AioCheckOut/V5"; // 信用卡 金流URL

              // 塞入API res
              const data = {
                ChoosePayment: response.data.ChoosePayment,
                EncryptType: response.data.EncryptType,
                ItemName: response.data.ItemName,
                MerchantID: response.data.MerchantID,
                MerchantTradeDate: response.data.MerchantTradeDate,
                MerchantTradeNo: response.data.MerchantTradeNo,
                PaymentType: response.data.PaymentType,
                ReturnURL: response.data.ReturnURL,
                TotalAmount: response.data.TotalAmount,
                TradeDesc: response.data.TradeDesc,
                CheckMacValue: response.data.CheckMacValue,
                OrderResultURL: response.data.OrderResultURL,
              };

              // 創建一個 form 元素
              const form = document.createElement("form");
              form.method = "POST"; // 提交方法為 POST
              form.action = url; // 表單 action 屬性為目標 URL
              form.style.display = "none"; // 隱藏表單

              // 將數據添加到 form 中作為 input 元素
              for (const key in data) {
                const input = document.createElement("input");
                input.type = "hidden"; // 隱藏input
                input.name = key; // input 的 name 屬性
                input.value = data[key]; // 設置 input 的 value 屬性
                form.appendChild(input); // input 添加到 form 中
              }

              // 將 form 添加到文檔中，然後自動提交
              document.body.appendChild(form);
              form.submit();

              this.clickWall = 0;
            } else if (response.data.status == -99) {
              this.popEVisable("請先登入帳號UID");
              this.clickWall = 0;
            } else if (response.data.status == -98) {
              this.popEVisable("系統無此商品，請重整畫面，重新選擇商品");
              this.clickWall = 0;
            }
          } catch (error) {
            console.error("Error:", error);
            this.clickWall = 0;
          }
        } else {
          this.popEVisable("請先登入帳號，及選擇伺服器、角色");
          this.clickWall = 0;
        }
      }
    },

    // 儲值tab切換
    tabChange(type) {
      this.popBig.tabType = type;
      if (type == "diamondTab" || type == "giftTab" || type == "promotionTab") {
        this.commodityTab = type;
      }
    },

    // 選角色存localStorage
    charCheck() {
      localStorage.setItem("char", this.popUID.char);
    },

    changeUID() {
      this.popUIDVisable();
      this.popUID = {
        visable: true,
        GameUID: "",
        disabled: false, //input鎖
        errorText: "",
        selectShow: false, //預設false 藏
        btnText: "登入",
        server: 0,
        char: "",
      };
    },
    changeChar() {
      this.popUIDVisable();

      this.popUID = {
        visable: true,
        GameUID: this.accountData.GameUID,
        disabled: true, //input鎖
        errorText: "",
        selectShow: true, //預設false 藏
        btnText: "確認",
        server: this.accountData.server,
        char: this.accountData.char,
      };
    },

    popSVisable(id, img, name, price, payment) {
      this.popSmall.id = id;
      this.popSmall.img = img;
      this.popSmall.name = name;
      this.popSmall.price = price;
      this.popSmall.payment = payment;
      this.popSmall.visable = !this.popSmall.visable;
      this.scrollLock();
    },
    popEVisable(text) {
      this.popEmpty.text = text;
      this.popEmpty.visable = !this.popEmpty.visable;
      this.scrollLock();
    },
    popUIDVisable() {
      this.popUID.GameUID = null;
      this.popUID.disabled = false;
      this.popUID.errorText = "";
      this.popUID.selectShow = false;
      this.popUID.btnText = "登入";
      this.popUID.visable = !this.popUID.visable;
      this.scrollLock();
    },
    popMVisable(id, img, name, price, content, payment) {
      this.popMiddle.id = id;
      this.popMiddle.img = img;
      this.popMiddle.name = name;
      this.popMiddle.price = price;
      this.popMiddle.text = content;
      this.popMiddle.payment = payment;
      this.popMiddle.visable = !this.popMiddle.visable;
      this.scrollLock();
    },
    popBVisable(title) {
      if (title == 0) {
        this.popBig.titleType = 0;
        this.popBig.tabType = "creditValue";
      } else if (title == 1) {
        this.popBig.titleType = 1;
      } else if (title == 2) {
        this.popBig.titleType = 2;
      }
      this.popBig.visable = !this.popBig.visable;
      this.scrollLock();
    },
    //帳號的切換選單 展開
    toggleUIDOpen(status) {
      if (status == undefined || status == null) {
        this.UIDOpen = !this.UIDOpen;
      } else {
        this.UIDOpen = status;
      }
    },
    // 鎖背景滾輪
    scrollLock() {
      if (
        this.popBig.visable == true ||
        this.popMiddle.visable == true ||
        this.popSmall.visable == true
      ) {
        document.documentElement.style.overflow = "hidden";
      } else {
        document.documentElement.style.overflow = "auto";
      }
    },

    checkCookie(name) {
      const cookies = document.cookie.split(";");
      const cookieName = `${name}=`;
      for (let i = 0; i < cookies.length; i++) {
        let cookie = cookies[i].trim();
        if (cookie.indexOf(cookieName) == 0) {
          return cookie.substring(cookieName.length, cookie.length);
        }
      }
      return "";
    },

    updateScreenWidth() {
      this.screenWidth = window.innerWidth;
    },
    menuShow() {
      this.menuM = !this.menuM;
    },
  },
  mounted() {
    const GameUID = localStorage.getItem("GameUID");
    const server = localStorage.getItem("server");
    const char = localStorage.getItem("char");

    if (GameUID == undefined) {
      this.accountData.GameUID = null;
    } else {
      this.accountData.GameUID = GameUID;
    }
    if (server == undefined) {
      this.accountData.server = null;
    } else {
      this.accountData.server = server;
    }
    if (char == undefined) {
      this.accountData.char = null;
    } else {
      this.accountData.char = char;
    }

    // API位址
    this.setting();

    // 監聽瀏覽器縮放
    window.addEventListener("resize", this.updateScreenWidth);

    setTimeout(() => {
      this.loadingVisible = false;
    }, 50);
  },

  beforeUnmount() {
    // 組件銷毀前移除事件監聽
    window.removeEventListener("resize", this.updateScreenWidth);
  },
};
</script>

<style lang="scss">
.swiperBox {
  width: 100%;
  height: 100%;
  img {
    object-fit: contain;
    width: 100%;
    height: 100%;
  }
}
.swiper-button-prev,
.swiper-button-next {
  background-image: url("/img/gameMall/arrow.png");
  background-repeat: no-repeat;
  background-size: contain;
  background-position: center;
  scale: 1.3;
  filter: drop-shadow(0px 0px 2px #000000) drop-shadow(0px 0px 2px #000000);
  &:after {
    content: "";
  }
}
.swiper-button-next {
  right: 30%;
  @media all and (max-width: 960px) {
    right: 5%;
  }
}
.swiper-button-prev {
  left: 30%;
  transform: scaleX(-1);
  @media all and (max-width: 960px) {
    left: 5%;
  }
}
.swiper-slide {
  -webkit-filter: brightness(0.1);
  opacity: 1;
  @media all and (max-width: 960px) {
    -webkit-filter: brightness(1);
    opacity: 1;
  }
}
.swiper-slide-active + .swiper-slide {
  -webkit-filter: brightness(1);
  scale: 1;
  opacity: 1;
}
</style>
