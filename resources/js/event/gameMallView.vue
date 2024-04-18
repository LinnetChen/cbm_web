<template>
    <div class="barPC" v-if="screenWidth > 900">
        <div class="menu">
            <div class="logo"><img src="/img/gameMall/MLOGO.png" alt="" /></div>
            <ul class="menuList">
                <button @click="popBVisable(0)">儲值教學​</button>
                <button @click="popBVisable(1)">使用說明​</button>
                <button @click="popUIDVisable()">{{ barAccount }}</button>
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
    <ul class="menuM" v-if="screenWidth <= 900 && menuM == true"></ul>

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
            <div class="container" v-for="(value, key) in items" :key="key">
                <div class="title" v-if="key.includes('title')">
                    {{ value }}
                </div>
                <div
                    class="imgBox"
                    v-if="key.includes('img')"
                    :class="{ rewardCbmImg: value.includes('rewardCbmImg1') }"
                >
                    <img :src="value" />
                    <div class="t" v-if="value.includes('rewardCbmImg1')"></div>
                </div>
                <div class="text" v-if="key.includes('text')">{{ value }}</div>
                <div
                    class="text"
                    v-if="key.includes('Ul')"
                    v-html="popBig.noticeValue.Ul"
                ></div>
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
                <div class="name">{{ popMiddle.name }}</div>
                <div class="price">{{ popMiddle.price }}</div>
            </div>
            <div class="right" v-html="popMiddle.text"></div>
            <div class="btnBox">
                <div class="creditCardBtn">信用卡支付</div>
                <div class="myCardBtn">MyCard</div>
            </div>
        </div>
        <div class="x" @click="popMVisable()">x</div>
    </div>
    <!-- UID中跳窗 -->
    <div class="popUID" v-if="popUID.visable">
        <div class="mask" @click="popUIDVisable()"></div>
        <div class="popBg">
            <div class="title">登入帳號</div>
            <div class="deco1"></div>
            <div class="deco2"></div>
            <form action="https://www.digeam.com/logout" method="post">
                <div class="inputBox">
                    <div class="inputAccount">
                        <label for="">帳號UID</label>
                        <input
                            type="text"
                            name="account"
                            id="account"
                            v-model="popUID.account"
                        />
                        <button class="accountManual" type="button" @click="">
                            ?
                        </button>
                    </div>
                    <div class="text">*查無此帳號，請再次檢查您輸入的資料​</div>
                    <div class="selectServer">
                        <label for="">選擇伺服器</label>
                        <select name="server" id="server">
                            <option value="" disabled="" selected="">
                                伺服器
                            </option>
                        </select>
                    </div>
                    <div class="selectCharacter">
                        <label for="">選擇角色</label>
                        <select name="character" id="character">
                            <option value="" disabled="" selected="">
                                角色名稱
                            </option>
                        </select>
                    </div>
                </div>
                <button
                    class="submit"
                    type="submit"
                    value="Send Request"
                    @click="accountSubmit()"
                >
                    送出帳號
                </button>
            </form>
        </div>
        <div class="x" @click="popUIDVisable()">x</div>
    </div>
    <!-- 小跳窗 -->
    <div class="popS" v-if="popSmall.visable">
        <div class="mask" @click="popSVisable()"></div>
        <div class="popBg">
            <div class="deco1"></div>
            <div class="deco2"></div>
            <img :src="popMiddle.img" />
            <div class="name">{{ popMiddle.name }}</div>
            <div class="price">{{ popMiddle.price }}</div>
            <div class="btnBox">
                <div class="creditCardBtn" @click="redirectToUrl('credit')">
                    信用卡支付
                </div>
                <div class="myCardBtn" @click="redirectToUrl('mycard')">
                    MyCard
                </div>
            </div>
        </div>
        <div class="x" @click="popSVisable()">x</div>
    </div>
    <!-- 空小跳窗 -->
    <div class="popE" v-if="popEmpty.visable">
        <div class="mask" @click="popSVisable()"></div>
        <div class="popBg">
            <div class="deco1"></div>
            <div class="deco2"></div>
            <div class="text" v-html="popEmpty.text"></div>
        </div>
        <div class="x" @click="popSVisable()">x</div>
    </div>

    <div class="fixBg"></div>
    <header class="header" id="header">
        <!-- <swiper
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
            <swiper-slide class="swiperBox"
                ><img src="/img/gameMall/imgTest.jpg" alt=""
            /></swiper-slide>
            <swiper-slide class="swiperBox"
                ><img src="/img/gameMall/imgTest.jpg" alt=""
            /></swiper-slide>
            <swiper-slide class="swiperBox"
                ><img src="/img/gameMall/imgTest.jpg" alt=""
            /></swiper-slide>
            <swiper-slide class="swiperBox"
                ><img src="/img/gameMall/imgTest.jpg" alt=""
            /></swiper-slide>
        </swiper> -->
    </header>
    <div class="commoditySection">
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
        <div class="contain">
            <div class="box">
                <div class="deco1"></div>
                <div class="deco2"></div>
                <img src="/img/gameMall/propImg.png" @click="popMVisable(1)" />
                <div class="name">100</div>
                <div class="price">100TWD</div>
                <button class="btnBuy" @click="popSVisable(id)">購買</button>
            </div>
            <div class="box"></div>
            <div class="box"></div>
            <div class="box"></div>
            <div class="box"></div>
            <div class="box"></div>
            <div class="box"></div>
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
let api = "https://cbm.digeam.com/api/jointAct";

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
        const onSlideChange = () => {
            // console.log("slide change");
        };
        return {
            onSlideChange,
            modules: [Autoplay, Navigation, Pagination],
        };
    },
    data() {
        return {
            slidesPerView: 3,
            screenWidth: window.innerWidth,
            menuM: false,
            barAccount: "登入帳號",

            popBig: {
                visable: false,
                titleType: 0,
                tabType: "myCardValue",

                creditValue: {
                    title1: "creditValue​",
                    img1: "/img/20240403_joinAct/rewardCbImg1.png",
                    text1: "坐騎服裝領取後可使用30天，包含特效屬性：致命傷害+9%及3個空插槽，不可交易。",
                    img2: "/img/20240403_joinAct/rewardCbImg2.png",
                    text2: "裝有Lv.4 GM祝福的聖水，使用後大幅提升角色能力值，持續1小時，不可交易。",
                },
                myCardValue: {
                    title1: "myCardValue​",
                    img1: "/img/20240403_joinAct/rewardCbImg1.png",
                    text1: "坐騎服裝領取後可使用30天，包含特效屬性：致命傷害+9%及3個空插槽，不可交易。",
                    img2: "/img/20240403_joinAct/rewardCbImg2.png",
                    text2: "裝有Lv.4 GM祝福的聖水，使用後大幅提升角色能力值，持續1小時，不可交易。",
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
            },
            popMiddle: {
                visable: false,
                img: "/img/gameMall/propImg.png",
                name: "100鑽​",
                price: "100TWD",
                text: "2<br>32<br>32<br>32<br>32<br>32<br><br><br><br>3",
            },
            popUID: {
                visable: false,
                account: "WWW",
                img: "/img/gameMall/propImg.png",
                name: "100鑽​",
                price: "100TWD",
                text: "2<br>32<br>32<br>32<br>32<br>32<br><br><br><br>3",
            },
            popSmall: {
                visable: false,
                text: "",
            },
            popEmpty: {
                visable: false,
                text: "1123333",
            },

            // 防連點
            clickWall: 0,

            user: {
                account: null,
                serialNum: null,
                serverCheck: null, //伺服器選後、領取後存入
            },

            // 紀錄伺服器選項變化
            selected: null,
        };
    },
    computed: {
        items() {
            // useCbValue值0 產出儲值教學，不然 產出使用說明
            return this.popBig.titleType === 0 &&
                this.popBig.tabType == "creditValue"
                ? this.popBig.creditValue
                : this.popBig.titleType === 0 &&
                  this.popBig.tabType == "myCardValue"
                ? this.popBig.myCardValue
                : this.popBig.noticeValue;
        },
    },
    methods: {
        // async getSetting() {
        //     try {
        //         const response = await axios.post(api, {
        //             type: "login",
        //             user: this.user.account,
        //         });
        //         if (response.data.status == 1) {
        //             // 序號
        //             this.user.serialNum = response.data.serial_num;

        //             // 伺服器
        //             this.user.serverCheck = response.data.serve;
        //         } else {
        //             console.error("Status is not 1:", response.data);
        //         }
        //     } catch (error) {
        //         console.error("Error:", error);
        //     }
        // },

        redirectToUrl(paymentMethod) {
            const url = ""; // 金流URL

            // 發送道具id
            const data = {
                id: 12345, // 假設你要發送的 id 值為 12345，根據你的需求修改
                method: paymentMethod, // 傳遞支付方式，這裡根據點擊的按鈕不同傳遞不同的值
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

            // form 添加到文檔中，自動提交
            document.body.appendChild(form);
            form.submit();
        },

        // 儲值tab切換
        tabChange(type) {
            this.popBig.tabType = type;
        },

        // 帳號提交
        accountSubmit() {
            console.log(this.popUID.account);
        },

        popSVisable(text) {
            this.popSmall.text = text;
            this.popSmall.visable = !this.popSmall.visable;
            this.scrollLock();
        },
        popUIDVisable() {
            this.popUID.visable = !this.popUID.visable;
            this.scrollLock();
        },
        popMVisable(id) {
            this.popMiddle.visable = !this.popMiddle.visable;
            this.scrollLock();
        },
        popBVisable(title) {
            if (title == 0) {
                this.popBig.titleType = 0;
                this.popBig.tabType = "creditValue";
            } else if (title == 1) {
                this.popBig.titleType = 1;
            }
            this.popBig.visable = !this.popBig.visable;
            this.scrollLock();
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
        if (this.checkCookie("StrID")) {
            this.user.account = this.checkCookie("StrID");
        }
        // API位址
        // this.getSetting();

        // 監聽瀏覽器縮放
        window.addEventListener("resize", this.updateScreenWidth);
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

</style>
