<template>
    <div class="barPC" v-if="screenWidth > 900">
        <div class="menu">
            <ul class="menuList">
                <li class="menuListItem"><a href="">Mobile事前預約​</a></li>
                <li class="menuDeco"></li>
                <li class="menuListItem"><a href="#header">聯動活動​</a></li>
                <li class="menuDeco"></li>
                <li class="menuListItem"><a href="">涅瓦雷斯人才招募中心​</a></li>
                <li class="menuListItem"><a href="">{{ screenWidth }}​</a></li>

            </ul>
        </div>
    </div>
    <div class="barM" v-if="screenWidth <= 900" @click="menuShow()">
        <div class="spanBox" :class="{'active':menuM}">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <ul class="menuM" v-if="screenWidth <= 900 && menuM == true ">
        <a class="logo" href=""><img src="/img/20240403_joinAct/cbmLOGO.png" alt=""></a>
        <li class="menuListItem"><a href="">Mobile事前預約​</a></li>
        <li class="menuListItem"><a href="#header">聯動活動​</a></li>
        <li class="menuListItem"><a href="">涅瓦雷斯人才招募中心​</a></li>
        <li class="menuListItem"><a href="">{{ screenWidth }}​</a></li>
    </ul>

    <div id="fb-root"></div>
    <div class="fixBg" v-if="screenWidth <= 900"></div>
    <header class="section header" id="header">
        <div class="bgBox">
            <div class="leftBox">
                <div class="logoBox">
                    <a href=""><img class="logo" src="/img/20240403_joinAct/cbmLOGO.png" alt=""></a>
                    <div class="crossBox">
                        <img class="cross" src="/img/20240403_joinAct/cross.png" alt="">
                    </div>
                    <a href=""><img class="logo" src="/img/20240403_joinAct/cbLOGO.png" alt=""></a>
                </div>
                <div class="subtitle"><img src="/img/20240403_joinAct/subtitle.png" alt=""></div>
                <div class="phone">
                    <div class="videoBox">
                        <iframe frameborder="0" src="https://www.youtube.com/embed/5sYIlYpAQNU?si=ScTBN_qHzZa7L_Op"
                            allowfullscreen="true"></iframe>
                    </div>
                </div>
                <div class="btnBoxPC">
                    <a class="google" href=""><img src="/img/20240403_joinAct/headerGoogle.png"></a>
                    <a class="ios" href=""><img src="/img/20240403_joinAct/headerIos.png"></a>
                </div>
                <!-- <div class="btnBoxM" v-if="menu.isAndroid || menu.isiOS">
                    <a v-if="menu.isAndroid" class="google"
                        href="https://play.google.com/store/apps/details?id=com.digeam.a.bptw"><img
                            src="/img/front/sec01Google.png"></a>
                    <a v-if="menu.isiOS" class="ios" href="https://apps.apple.com/TW/app/id6470368870"><img
                            src="/img/front/sec01Ios.png"></a>
                </div> -->
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
                <p>註冊並登入DiGeam掘夢網平台帳號​</p>
                <div class="logBox" v-if="login">
                    <!-- 這邊登出鈕 -->
                    <p>您已登入掘夢網帳號</p>
                    <p class="account"></p>
                    <div class="logout"></div>
                </div>
                <div class="logBox" v-else>
                    <!-- 這邊登入鈕 -->
                    <div class="login">登入</div>
                    <p>※新用戶請點此​<a href="">前往註冊</a></p>
                </div>
            </div>
            <div class="stepBg">
                <div class="deco1"></div>
                <div class="deco2"></div>
                <p class="stepTitle">STEP.2</p>
                <p>立即預約</p>
                <div class="storeBtnBox">
                    <a class="google" href=""><img src="/img/20240403_joinAct/sec01Google.png"></a>
                    <a class="ios" href=""><img src="/img/20240403_joinAct/sec01Ios.png"></a>
                </div>
            </div>
            <div class="stepBg">
                <div class="deco1"></div>
                <div class="deco2"></div>
                <p class="stepTitle">STEP.3</p>
                <p>按讚追蹤官方Facebook粉絲團​</p>
                <div class="fb">
                    <!-- <div class="fb-page" data-href="https://www.facebook.com/DiGeamCabalM/" data-tabs="timeline"
                        data-width="287" data-height="72" data-small-header="true" data-adapt-container-width="false"
                        data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/DiGeamCabalM/" class="fb-xfbml-parse-ignore"><a
                                href="https://www.facebook.com/DiGeamCabalM/">黑色契約 Mobile</a></blockquote>
                    </div> -->
                    <iframe
                        src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FDiGeamCabalM%2F&tabs=timeline&width=287&height=70&small_header=true&adapt_container_width=false&hide_cover=false&show_facepile=true&appId"
                        width="287" height="70" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                        allowfullscreen="true"
                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
                <div class="checkBox">
                    <label>
                        <input type="checkbox" name="privacy">
                        我已閱讀並同意<span>隱私權政策</span></label>
                </div>
                <div class="checkBox">
                    <label>
                        <input type="checkbox" name="notice">
                        我已閱讀並同意<span>注意事項</span></label>
                </div>
            </div>
        </div>
        <div class="rewardBox">
            <div class="rewardPC">
                <div class="left">
                    <img src="/img/20240403_joinAct/rewardLogoCb.png" alt="">
                    <select name="" id="">
                        <option value="0">黑恆星</option>
                        <option value="1">冰珀星</option>
                    </select>
                </div>
                <div class="right">
                    <div class="iconBox">
                        <img src="/img/20240403_joinAct/rewardLight.png" alt="">
                        <p>【坐騎外觀】<br>​滅殺之​菲皇<br>的小雞​(30日)</p>
                    </div>
                    <div class="rewardBtn">立即領獎</div>
                </div>
            </div>
            <div class="rewardM">
                <div class="topBox">
                    <img src="/img/20240403_joinAct/rewardLogoCbm.png" alt="">
                    <div class="iconBox">
                        <img src="/img/20240403_joinAct/rewardLight.png" alt="">
                        <p>【坐騎外觀】<br>​滅殺之​菲皇<br>的小雞​(30日)</p>
                    </div>
                </div>
                <div class="rewardBtn">XWE0000000000000</div>
            </div>
        </div>
    </div>
    <div class="section sec02">
        <div class="sec02Title"></div>
        <div class="sec02Text"><img src="/img/20240403_joinAct/stayTuned.png" alt=""></div>
    </div>
</template>



<script>
export default {
    data() {
        return {
            login: false,
            screenWidth: window.innerWidth,
            menuM:false,
        }
    },
    computed: {
    },
    methods: {
        updateScreenWidth() {
            this.screenWidth = window.innerWidth;
        },
        menuShow(){
            this.menuM = !this.menuM;
        },
    },
    mounted() {
        // 监听窗口大小变化
        window.addEventListener('resize', this.updateScreenWidth);
    },
    beforeUnmount() {
        // 组件销毁前移除事件监听器
        window.removeEventListener('resize', this.updateScreenWidth);
    }
};
</script>