<template>
    <div class="barPC" v-if="screenWidth > 900">
        <div class="menu">
            <ul class="menuList">
                <li class="menuListItem"><a href="">Mobile事前預約​</a></li>
                <li class="menuDeco">|</li>
                <li class="menuListItem"><a href="#header">聯動活動​</a></li>
                <li class="menuDeco">|</li>
                <li class="menuListItem">
                    <a href="">涅瓦雷斯人才招募中心​</a>
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
        <a class="logo" href=""
            ><img src="/img/20240403_joinAct/cbmLOGO.png" alt=""
        /></a>
        <li class="menuListItem"><a href="">Mobile事前預約​</a></li>
        <li class="menuListItem"><a href="#header">聯動活動​</a></li>
        <li class="menuListItem"><a href="">涅瓦雷斯人才招募中心​</a></li>
    </ul>

    <!-- 大跳窗 -->
    <!-- <div class="popBig"> -->
    <div class="popBig" v-if="popBig.visable">
        <div class="mask" @click="popBVisable()"></div>
        <div class="popBg">
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
        <div class="x" @click="popBVisable()"></div>
    </div>

    <!-- 小跳窗 -->
    <div class="popSmall" v-if="popSmall.visable">
        <div class="mask" @click="popSVisable()"></div>
        <div class="popBg">
            <div class="text" v-html="popSmall.text"></div>
        </div>
        <div class="x" @click="popSVisable()"></div>
    </div>

    <div id="fb-root"></div>
    <div class="fixBg" v-if="screenWidth <= 900"></div>
    <header class="section header" id="header">
        <div class="bgBox">
            <div class="leftBox">
                <div class="logoBox">
                    <a :href="link.mIndex"
                        ><img
                            class="logo"
                            src="/img/20240403_joinAct/cbmLOGO.png"
                    /></a>
                    <div class="crossBox">
                        <img
                            class="cross"
                            src="/img/20240403_joinAct/cross.png"
                        />
                    </div>
                    <a :href="link.cbIndex" target="_blank"
                        ><img
                            class="logo"
                            src="/img/20240403_joinAct/cbLOGO.png"
                    /></a>
                </div>
                <div class="subtitle">
                    <img src="/img/20240403_joinAct/subtitle.png" />
                </div>
                <div class="phone">
                    <div class="videoBox">
                        <iframe
                            ref="youtubePlayer"
                            frameborder="0"
                            src="https://www.youtube.com/embed/5sYIlYpAQNU?si=ScTBN_qHzZa7L_Op&autoplay=1&playlist=5sYIlYpAQNU&loop=1"
                            allowfullscreen="true"
                        ></iframe>
                    </div>
                </div>
                <div class="btnBoxPC" v-if="!device.isAndroid && !device.isiOS">
                    <a
                        class="google"
                        :href="link.androidLink"
                        target="_blank"
                        @click="saveBtnClick('Android')"
                        ><img src="/img/20240403_joinAct/headerGoogle.png"
                    /></a>
                    <a
                        class="ios"
                        :href="link.iOSLink"
                        target="_blank"
                        @click="saveBtnClick('iOS')"
                        ><img src="/img/20240403_joinAct/headerIos.png"
                    /></a>
                </div>
                <div class="btnBoxM" v-if="device.isAndroid || device.isiOS">
                    <a
                        class="google"
                        v-if="device.isAndroid"
                        :href="link.androidLink"
                        target="_blank"
                        ><img src="/img/20240403_joinAct/headerGoogle.png"
                    /></a>
                    <a
                        class="ios"
                        v-if="device.isiOS"
                        :href="link.iOSLink"
                        target="_blank"
                        ><img src="/img/20240403_joinAct/headerIos.png"
                    /></a>
                </div>
            </div>
        </div>
    </header>

    <div class="section sec01">
        <div class="sec01Title"></div>
        <div class="sec01Text">完成即可領取電腦 + 手機雙平台獎勵！​</div>
        <div class="stepBox">
            <div class="stepBg">
                <div class="deco1"></div>
                <div class="deco2"></div>
                <p class="stepTitle">STEP.1</p>
                <p class="text">註冊並登入DiGeam掘夢網平台帳號​</p>
                <div class="logBox" v-if="user.account">
                    <!-- 這邊登出鈕 -->
                    <form
                        id="logout-form"
                        action="https://www.digeam.com/logout"
                        method="POST"
                        v-if="user.account"
                    >
                        <input
                            type="hidden"
                            name="return_url"
                            id="return_url"
                            v-model="link.returnUrl"
                        />

                        <p class="account">
                            您已登入掘夢網帳號<br />
                            <span>{{ user.account }}</span>
                        </p>
                        <button
                            class="logout"
                            id="logout-button"
                            type="submit"
                            value="Submit"
                        >
                            登出
                        </button>
                    </form>

                    <!-- <p class="account">
                        您已登入掘夢網帳號<br>
                        <span>{{ user.account }}</span>
                    </p>
                    <button class="logout">登出</button> -->
                </div>
                <div class="logBox" v-else-if="!user.account">
                    <!-- 這邊登入鈕 -->
                    <!-- <button><a class="login" href="https://www.digeam.com/login">登入</a></button> -->
                    <a class="login" href="https://www.digeam.com/login"
                        >登入</a
                    >
                    <p>
                        ※新用戶請點此​<a href="https://www.digeam.com/register"
                            >前往註冊</a
                        >
                    </p>
                </div>
            </div>
            <div class="stepBg">
                <div class="deco1"></div>
                <div class="deco2"></div>
                <p class="stepTitle">STEP.2</p>
                <p>立即預約</p>
                <div class="storeBtnBox">
                    <a
                        class="google"
                        :href="link.androidLink"
                        target="_blank"
                        @click="saveBtnClick('Android')"
                        ><img src="/img/20240403_joinAct/sec01Google.png"
                    /></a>
                    <a
                        class="ios"
                        :href="link.iOSLink"
                        target="_blank"
                        @click="saveBtnClick('ios')"
                        ><img src="/img/20240403_joinAct/sec01Ios.png"
                    /></a>
                </div>
            </div>
            <div class="stepBg">
                <div class="deco1"></div>
                <div class="deco2"></div>
                <p class="stepTitle">STEP.3</p>
                <p class="text">按讚追蹤官方Facebook粉絲團​</p>
                <div class="fb">
                    <iframe
                        src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FDiGeamCabalM%2F&tabs=timeline&width=287&height=70&small_header=true&adapt_container_width=false&hide_cover=false&show_facepile=true&appId"
                        width="287"
                        height="70"
                        style="border: none; overflow: hidden"
                        scrolling="no"
                        frameborder="0"
                        allowfullscreen="true"
                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                    ></iframe>
                </div>
                <div class="checkBox">
                    <label for="privacy">
                        <input
                            type="checkbox"
                            name="privacy"
                            value="privacy"
                            v-model="checkList"
                        />
                        我已閱讀並同意<a
                            href="https://www.digeam.com/terms2"
                            target="_blank"
                            ><span>隱私權政策</span></a
                        ></label
                    >
                    <br />
                    <label for="notice">
                        <input
                            type="checkbox"
                            name="notice"
                            value="notice"
                            v-model="checkList"
                        />
                        我已閱讀並同意<span @click="popBVisable('notice')"
                            >注意事項</span
                        ></label
                    >
                </div>
            </div>
        </div>
        <div class="rewardBox">
            <div class="rewardPC">
                <div class="left">
                    <img src="/img/20240403_joinAct/rewardLogoCb.png" />
                    <select v-model="selected" v-if="user.serverCheck == null">
                        <option value="null" hidden>請選擇領獎伺服器</option>
                        <option value="1">黑恆星</option>
                        <option value="2">冰珀星</option>
                    </select>
                    <div class="serverCheck" v-if="user.serverCheck == 1">
                        黑恆星
                    </div>
                    <div class="serverCheck" v-if="user.serverCheck == 2">
                        冰珀星
                    </div>
                </div>
                <div class="right">
                    <div class="iconBox">
                        <img
                            src="/img/20240403_joinAct/rewardLightPC.png"
                            @click="popBVisable('PC')"
                        />
                        <p>【坐騎外觀】<br />貴族小菲雞<br />的小雞​(30日)</p>
                    </div>
                    <div class="rewardBtn" @click="reward('Cb')">
                        <p
                            v-if="
                                user.serverCheck == 1 || user.serverCheck == 2
                            "
                        >
                            領獎完畢
                        </p>
                        <p v-if="user.serverCheck == null">立即領獎</p>
                    </div>
                </div>
            </div>
            <div class="rewardM">
                <div class="topBox">
                    <img src="/img/20240403_joinAct/rewardLogoCbm.png" />
                    <div class="iconBox">
                        <img
                            src="/img/20240403_joinAct/rewardLightM.png"
                            @click="popBVisable('m')"
                        />
                        <p>【時裝箱】<br />黑色契約校服<br />​(30日)</p>
                    </div>
                </div>
                <div class="rewardBtn" @click="reward('m')">
                    <!-- 立即預約 -->
                    <p v-if="user.serialNum !== null">{{ user.serialNum }}</p>
                    <p v-if="user.serialNum == null">立即領獎</p>
                </div>
            </div>
        </div>
    </div>
    <div class="section sec02">
        <div class="sec02Bg">
            <div class="sec02Title"></div>
            <!-- <p>更多聯動合作內容​</p>
            <p>上市後請前往 《黑色契約Mobile》 與 《黑色契約Cabal Online》​</p>
            <p>在涅瓦雷斯一探究竟！​</p> -->
            <!-- <div class="sec02Text"><img src="/img/20240403_joinAct/stayTuned.png" alt=""></div> -->
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

export default {
    data() {
        return {
            screenWidth: window.innerWidth,
            menuM: false,
            link: {
                returnUrl: "https://cbm.digeam.com/jointAct",

                androidLink:
                    "https://play.google.com/store/apps/details?id=com.estgames.cm.tw",
                iOSLink: "https://apps.apple.com/TW/app/id6476968999",

                cbIndex: "https://cbo.digeam.com/index", //cb端遊官網
                mIndex: "", //m的官網
            },
            popBig: {
                visable: false,
                useCbValue: 1,

                cbValue: {
                    img1: "/img/20240403_joinAct/rewardCbImg1.png",
                    title1: "【坐騎外觀】貴族小菲雞(30日)​",
                    text1: "坐騎服裝領取後可使用30天，包含特效屬性：致命傷害+9%及3個空插槽，不可交易。",
                    img2: "/img/20240403_joinAct/rewardCbImg2.png",
                    title2: "GM的祝福(Lv.4)聖水 x10",
                    text2: "裝有Lv.4 GM祝福的聖水，使用後大幅提升角色能力值，持續1小時，不可交易。",
                },
                cbmValue: {
                    img1: "/img/20240403_joinAct/rewardCbmImg1.png",
                    title: "【時裝箱】黑色契約校服(30日)",
                    text: "領取後可使用30天，包含1個空插槽，不可交易。​",
                },
                noticeValue: {
                    title: "注意事項​",
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
            popSmall: {
                visable: false,
                text: "",
            },

            // 當前裝置系統
            device: {
                isAndroid: null,
                isiOS: null,
            },
            // 有無點擊APP BTN
            click: {
                Android: null,
                iOS: null,
            },

            // 防連點
            clickWall: 0,

            user: {
                account: null,
                serialNum: null,
                // serialNum: 'XWE1234567891234',
                serverCheck: null, //伺服器選後、領取後存入
            },

            // 紀錄伺服器選項變化
            selected: null,

            // 隱私權、注意事項點擊狀態
            checkList: [],
        };
    },
    computed: {
        items() {
            // useCbValue值0 產出PC版跳窗資訊，1 產出手機板跳窗資訊
            // return this.popBig.useCbValue === 0 ? this.popBig.cbValue : this.popBig.cbmValue;
            return this.popBig.useCbValue === 0
                ? this.popBig.cbValue
                : this.popBig.useCbValue === 1
                ? this.popBig.cbmValue
                : this.popBig.noticeValue;
        },
    },
    methods: {
        async getSetting() {

            try {
                const response = await axios.post(api, {
                    type: "login",
                    user: this.user.account,
                });
                if (response.data.status == 1) {
                    // 序號
                    this.user.serialNum = response.data.serial_num;

                    // 伺服器
                    this.user.serverCheck = response.data.serve;
                } else {
                    console.error("Status is not 1:", response.data);
                }
            } catch (error) {
                console.error("Error:", error);
            }
        },

        popSVisable(text) {
            this.popSmall.text = text;
            this.popSmall.visable = !this.popSmall.visable;
        },
        popBVisable(detection) {
            if (detection == "PC") {
                this.popBig.useCbValue = 0;
            } else if (detection == "m") {
                this.popBig.useCbValue = 1;
            } else if (detection == "notice") {
                this.popBig.useCbValue = 2;
            }
            this.popBig.visable = !this.popBig.visable;
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

        async rewardCb() {
            this.clickWall = 0;

            if (this.selected !== null) {
                try {
                    const response = await axios.post(api, {
                        type: "reward_cb",
                        user: this.user.account,
                        serve: this.selected,
                    });

                    if (response.data.status == 1) {
                        this.popSVisable("領取成功");
                        this.user.serialNum = response.data.serial_num;
                    } else if (response.data.status == -99) {
                        // 未有端遊角色
                        this.popSVisable(
                            '請在黑色契約Online中<br>​創建至少一個角色<br><a href="#">​前往創建</a>​'
                        );
                    } else if (response.data.status == -98) {
                        this.popSVisable("請先登入​");
                    } else if (response.data.status == -97) {
                        this.popSVisable("請正確選擇伺服器​");
                    } else if (response.data.status == -96) {
                        this.popSVisable("此帳號已領取獎勵");
                    } else {
                        console.error("Status is not 1:", response.data);
                    }
                } catch (error) {
                    console.error("Error:", error);
                }
            } else {
                this.popSVisable("請選領獎伺服器​");
            }
        },
        async rewardCbm() {
            this.clickWall = 0;

            try {
                const response = await axios.post(api, {
                    type: "reward_m",
                    user: this.user.account,
                });

                if (response.data.status == 1) {
                    this.popSVisable("領取成功");
                    this.user.serialNum = response.data.serial_num;
                } else if (response.data.status == -99) {
                    this.popSVisable("請先登入​");
                } else if (response.data.status == -98) {
                    this.popSVisable("此帳號已領取");
                } else {
                    console.error("Status is not 1:", response.data);
                }
            } catch (error) {
                console.error("Error:", error);
            }
        },
        reward(actType) {
            const privacy = this.checkList.includes("privacy");
            const notice = this.checkList.includes("notice");

            if (this.clickWall == 0) {
                this.clickWall = 1;

                if (actType == "m" && this.user.serialNum !== null) {
                    // CBM獎勵已經領取
                    return;
                } else {
                    // 驗證step123
                    if (this.user.account !== null) {
                        // 有登入 帳號

                        if (this.click.Android || this.click.iOS) {
                            if (privacy && notice) {
                                // 有同意隱私

                                if (actType == "Cb") {
                                    this.rewardCb();
                                } else if (actType == "m") {
                                    this.rewardCbm();
                                }
                            } else {
                                this.popSVisable(
                                    "請閱讀並同意<br>​隱私權政策與注意事項​"
                                );
                            }
                        } else {
                            this.popSVisable("請點擊商店按紐<br>完成預約​​");
                        }
                    } else {
                        this.popSVisable("請登入<br>DiGeam掘夢網平台帳號​");
                    }
                }
            }
        },

        // 偵測 And / IOS
        deviceDetection() {
            const ua = navigator.userAgent;
            const isAndroid = ua.includes("Android") || ua.includes("Adr");
            const isiOS = /\b(iPad|iPhone|iPod)\b/.test(ua);
            this.device = { isAndroid, isiOS };
        },

        // 點擊APP BTN紀錄 存取
        saveBtnClick(a) {
            if (a == "Android") {
                localStorage.setItem("Android", true);
                this.click.Android = true;
            }
            if (a == "iOS") {
                localStorage.setItem("iOS", true);
                this.click.iOS = true;
            }
        },

        // 登入後再跳轉回來的功能
        updateReturnUrl() {
            var returnUrl = "https://cbm.digeam.com/jointAct";
            var encodedUrl = btoa(returnUrl);
            document.cookie =
                "return_url=" +
                encodedUrl +
                "; path=/; domain=.digeam.com; secure";
        },
    },
    mounted() {
        if (this.checkCookie("StrID")) {
            this.user.account = this.checkCookie("StrID");
        }
        // API位址
        this.getSetting();

        // 監聽瀏覽器縮放
        window.addEventListener("resize", this.updateScreenWidth);

        this.deviceDetection();

        const Android = localStorage.getItem("Android");
        const iOS = localStorage.getItem("iOS");

        if (Android == undefined) {
            this.click.Android = null;
        } else {
            this.click.Android = true;
        }
        if (iOS == undefined) {
            this.click.iOS = null;
        } else {
            this.click.iOS = true;
        }
    },

    beforeUnmount() {
        // 組件銷毀前移除事件監聽
        window.removeEventListener("resize", this.updateScreenWidth);
    },
};
</script>
