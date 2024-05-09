<template>
    <div class="loading-container" v-if="loadingVisible">
        <div class="loader">
            <span v-html="loadingText"></span>
        </div>
    </div>
    <div class="barPC">
        <div class="menu">
            <div class="logo">
                <a href="https://cbm.digeam.com/index"
                    ><img src="/img/gameMall/MLogo.png"
                /></a>
            </div>
            <ul class="menuList" v-if="screenWidth > 900">
                <button class="cardValue" @click="popBVisable(0)">
                    儲值教學​
                </button>
                <button class="noticeValue" @click="popBVisable(1)">
                    使用說明​
                </button>
                <button
                    class="login"
                    @click="popUIDVisable()"
                    v-if="
                        accountData.char == null || accountData.char == 'null'
                    "
                >
                    登入帳號
                </button>
                <li
                    class="GameUID"
                    v-if="
                        accountData.char !== null && accountData.char !== 'null'
                    "
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
                    <button
                        class="accountManual"
                        type="button"
                        @click="popBVisable(2)"
                    >
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
                <div class="inputEmail" v-if="popUID.emailInputShow">
                    <label for="">信箱</label>
                    <input
                        type="text"
                        name="email"
                        id="email"
                        v-model="popUID.email"
                    />
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
            <!-- <div class="tabBox" v-if="popBig.titleType == 0">
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
            </div> -->
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
                        <div
                            class="t"
                            v-if="value.includes('rewardCbmImg1')"
                        ></div>
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
            :autoplay="{ delay: 5000, disableOnInteraction: false }"
            @slideChange="onSlideChange"
            class="mySwiper"
        >
            <swiper-slide
                class="swiperBox"
                v-for="(item, index) in repeatedImgUrl"
                :key="index"
            >
                <a v-if="item.url == ''">
                    <img :src="item.img_url" />
                </a>
                <a v-else :href="item.url" :target="item.target">
                    <img :src="item.img_url" />
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
            <div
                v-for="(item, index) in filteredItemList"
                :key="index"
                class="box"
            >
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
            <a href="https://www.digeam.com/terms" target="_blank"
                >會員服務條款</a
            >
            <a href="https://www.digeam.com/terms2" target="_blank">隱私條款</a>
            <a href="https://www.digeam.com/cs" target="_blank">客服中心</a>
            <p class="Copyright">
                Copyright © ESTgames Corp. All rights reserved.​ 2023 Licensed
                and published for Taiwan, Hong Kong and Macau by DiGeam Co.,Ltd​
                CABAL Online is a registered trademark of ESTgames Corp (and the
                logo of ESTgames).​
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
let buy_api_funpoint = "https://mobileapi.digeam.com/api/funPoint"; //funPoint購買商品
let buy_api = "";
let email_api = "https://mobileapi.digeam.com/api/bind_email";

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
            loadingVisible: true,
            loadingText: `<span>C</span><span>A</span><span>B</span><span>A</span><span>L</span><span>&nbsp;&nbsp;</span><span>M</span><span>O</span><span>B</span><span>I</span><span>L</span><span>E</span>`,
            slidesPerView: 3, //swiper預覽數量
            screenWidth: window.innerWidth, //螢幕寬度
            screenHeight: window.innerHeight, //螢幕高度
            menuM: false, //手機選單
            UIDOpen: false, //GameUID選單開

            // 要顯示的商品分類
            item_tab: ["normal", "gift", "sale"],
            // 商品分類tab目前選擇
            commodityTab: "diamondTab",

            item_lists: [{}],
            img_url: [{}],
            repeatedImgUrl: [], //img_url物件重複兩次

            // 玩家UID當前資料
            accountData: {
                GameUID: "",
                server: 0,
                char: "",
            },
            charList: [], // api回傳 該伺服器 角色列表

            // 跳窗
            popBig: {
                visable: false,
                titleType: 0,
                tabType: "creditValue",

                creditValue: {
                    text1: "Step1：在官網上找到您要儲值的金額後，點選「購買」。",
                    img1: "/img/gameMall/creditValueImg01.png",
                    text2: "Step2：選擇您欲使用的支付方式，前往付款。",
                    img2: "/img/gameMall/creditValueImg02.png",
                    text3: "Step3：選擇「信用卡支付」，填寫完紅框處信用卡資料，即可完成付款。",
                    img3: "/img/gameMall/creditValueImg03.png",
                },
                myCardValue: {
                    title1: "myCardValue​",
                    img1: "",
                    text1: "",
                    img2: "/img/gameMall/.png",
                    text2: "文字",
                },
                noticeValue: {
                    Ul: `
                    <ul>
                        <li style="color:red;">ios用戶請使用chrome瀏覽器進行購買</li>
                        <li>商品購買完成後，會自動配發到郵件箱的道具倉庫中。</li>
                        <li>特定優惠禮包可能會有時效性，請詳閱商品說明，實際效果或限制依遊戲設定為主。</li>
                        <li>若有發生儲值相關異常狀況，請至客服中心回報。</li>
                        <li>若逕行利用該異常取得非屬原機制應得之商品或獎勵者，本公司有權終止其進行遊戲。</li>
                        <li>掘夢網保留變更、取消或終止本活動的權利，包括但不限於本活動條款及活動辦法。</li>
                    </ul>
                    `,
                },
                teachUIDSerch: {
                    title1: "如何查詢UID",
                    text1: "Step1：點選右上角「選單」後，在右下角找到「選項」。",
                    img1: "/img/gameMall/teachUIDSerchImg01.png",
                    text2: "Step2：左下滑到下方，找到「資訊」。",
                    img2: "/img/gameMall/teachUIDSerchImg02.png",
                    text3: "Step3：在資訊中，找到「UID」欄位。",
                    text4: "旁邊還有貼心的複製功能可以讓您快速的複製貼上唷！",
                    img3: "/img/gameMall/teachUIDSerchImg03.png",
                },
            },
            popMiddle: {
                visable: false,
                img: "",
                name: "​",
                price: "",
                text: "",
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
                emailInputShow: false,
                email: "",
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
                return this.item_lists.filter(
                    (item) => item.item_cate == "normal"
                );
            } else if (this.commodityTab == "giftTab") {
                return this.item_lists.filter(
                    (item) => item.item_cate == "gift"
                );
            } else if (this.commodityTab == "promotionTab") {
                return this.item_lists.filter(
                    (item) => item.item_cate == "sale"
                );
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
        async handlePopstate() {
            // 等待一小段時間再設置 loadingVisible
            await new Promise((resolve) => setTimeout(resolve, 50));
            this.loadingVisible = false;
        },
        // 帳號判定API
        async UIDSubmit() {
            if (this.popUID.selectShow == false) {
                // 防止玩家輸入UID後直接關掉，再次輸入時，信箱欄位會跑出來
                this.popUID.emailInputShow = false;
            }
            if (this.popUID.btnText == "確認") {
                // 選角色.伺服.信箱 階段
                this.accountData.GameUID = this.popUID.GameUID;
                if (
                    this.popUID.server == 0 ||
                    this.popUID.char == "" ||
                    this.popUID.email == ""
                ) {
                    this.popUID.errorText = "*請正確填寫資料";
                } else {
                    this.emailSubmit();
                }
            } else {
                try {
                    const response = await axios.post(login_api, {
                        type: "login",
                        GameUID: this.popUID.GameUID,
                    });
                    if (response.data.status == 1) {
                        this.accountData.GameUID = this.popUID.GameUID;
                        localStorage.setItem(
                            "GameUID",
                            this.accountData.GameUID
                        );

                        //清空角色列、錯誤提示，鎖帳號input
                        this.charList = "";
                        this.popUID.errorText = "";
                        this.popUID.disabled = true;

                        this.popUID.selectShow = true;
                        this.popUID.btnText = "確認";
                        if (response.data.email == "") {
                            // 如果未綁定信箱，就出現信箱input
                            this.popUID.emailInputShow = true;
                        } else {
                            this.popUID.email = response.data.email;
                        }
                    } else if (response.data.status == -99) {
                        this.popUID.errorText =
                            "*查無此帳號，請再次檢查您輸入的資料";
                    }
                } catch (error) {
                    console.error("Error:", error);
                }
            }
        },
        // email發送API
        async emailSubmit() {
            try {
                const response = await axios.post(email_api, {
                    GameUID: this.accountData.GameUID,
                    email: this.popUID.email,
                });
                if (response.data.status == 1) {
                    this.accountData.server = this.popUID.server;
                    this.accountData.char = this.popUID.char;
                    this.popUIDVisable();
                } else if (response.data.status == -99) {
                    this.popUID.errorText = "無此帳號";
                } else if (response.data.status == -98) {
                    alert("信箱格式錯誤");
                    this.popUID.errorText = "";
                }
            } catch (error) {
                console.error("Error:", error);
            }
        },
        // server判定API
        async serverCheck() {
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
                    this.repeatedImgUrl = [...this.img_url, ...this.img_url];
                    this.item_lists = response.data.item_lists;
                    this.item_tab = response.data.item_tab;
                    setTimeout(() => {
                        this.loadingVisible = false;
                    }, 500);
                } else if (response.data.status == -99) {
                    console.error("Status is not 1:", response.data);
                }
            } catch (error) {
                console.error("Error:", error);
            }
        },

        // 購買道具
        async buy(type, id) {
            // this.loadingText =
            //     "<span>頁</span><span>面</span><span>跳</span><span>轉</span><span>中</span><span>，</span><span>請</span><span>稍</span><span>候</span>";
            // this.loadingVisible = true;
            if (type == "mycard") {
                buy_api = buy_api_mycard;
            } else {
                buy_api = buy_api_funpoint;
            }

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
                                "https://payment.funpoint.com.tw/Cashier/AioCheckOut/V5"; // 信用卡 金流URL

                            // 塞入API res
                            const data = {
                                ChoosePayment: response.data.ChoosePayment,
                                EncryptType: response.data.EncryptType,
                                ItemName: response.data.ItemName,
                                MerchantID: response.data.MerchantID,
                                MerchantTradeDate:
                                    response.data.MerchantTradeDate,
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
                            form.target = "_blank"; //另開分頁
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
                            setTimeout(() => {
                                window.open(url, "_blank");
                            }, 0);
                            form.submit();

                            this.popSmall.visable = false;
                            this.popEmpty.visable = false;
                            this.popMiddle.visable = false;
                            this.scrollLock();
                            this.clickWall = 0;
                        } else if (
                            response.data.status == 1 &&
                            type == "mycard"
                        ) {
                            // 跳轉到api傳送過來的網址
                            window.open(response.data.url, "_blank");
                            this.popSmall.visable = false;
                            this.popEmpty.visable = false;
                            this.popMiddle.visable = false;
                            this.scrollLock();
                            this.clickWall = 0;
                        } else if (response.data.status == -99) {
                            this.loadingVisible = false;
                            this.popEVisable("請先登入帳號UID");
                            this.clickWall = 0;
                        } else if (response.data.status == -98) {
                            this.loadingVisible = false;
                            this.popEVisable("查無此帳號，請檢查您的UID帳號");
                            this.clickWall = 0;
                        }
                    } catch (error) {
                        console.error("Error:", error);
                        this.clickWall = 0;
                    }
                } else {
                    this.loadingVisible = false;
                    this.popEVisable("請先登入帳號，及選擇伺服器、角色");
                    this.clickWall = 0;
                }
            }
        },

        // 儲值tab切換
        tabChange(type) {
            this.popBig.tabType = type;
            if (
                type == "diamondTab" ||
                type == "giftTab" ||
                type == "promotionTab"
            ) {
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
                emailInputShow: false,
                email: "",
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

        // 監聽瀏覽器歷史記錄的變化
        window.addEventListener("popstate", this.handlePopstate);

        // 監聽瀏覽器縮放
        window.addEventListener("resize", this.updateScreenWidth);
    },

    beforeUnmount() {
        // 組件銷毀前移除事件監聽
        window.removeEventListener("resize", this.updateScreenWidth);
        window.removeEventListener("popstate", this.handlePopstate);
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
        display: none;
    }
}
.swiper-button-prev {
    left: 30%;
    transform: scaleX(-1);
    @media all and (max-width: 960px) {
        display: none;
    }
}
.swiper-slide {
    pointer-events: none;
    -webkit-filter: brightness(0.1);
    opacity: 1;
    @media all and (max-width: 960px) {
        -webkit-filter: brightness(1);
        opacity: 1;
    }
}
.swiper-slide-active + .swiper-slide {
    pointer-events: auto;
    -webkit-filter: brightness(1);
    scale: 1;
    opacity: 1;
}
</style>
