<template>
    <!-- <div class="barPC">
        <div class="menu">
            <ul class="menuList">
                <li class="menuListItem"><a href=""></a></li>
            </ul>
        </div>
    </div>
    <div class="barM">
        <input type="checkbox">
        <span></span>
        <span></span>
        <span></span>
        <ul class="menu">
            <li class="menuListItem"><a href=""></a></li>
        </ul>
    </div> -->

    <header class="section header">
        <div class="bgBox">
            <div class="leftBox">
                <div class="logoBox">
                    <a href=""><img class="logo" src="\img\20240403_joinAct\cbmLOGO.png" alt=""></a>
                    <div class="crossBox">
                        <img class="cross" src="\img\20240403_joinAct\cross.png" alt="">
                    </div>
                    <a href=""><img class="logo" src="\img\20240403_joinAct\cbLOGO.png" alt=""></a>
                </div>
                <div class="subtitle"><img src="\img\20240403_joinAct\subtitle.png" alt=""></div>
                <div class="phone">
                    <div class="videoBox">
                        <iframe frameborder="0" src="https://www.youtube.com/embed/5sYIlYpAQNU?si=ScTBN_qHzZa7L_Op"
                            allowfullscreen="true"></iframe>
                    </div>
                </div>
                <div class="btnBoxPC">
                    <a class="google" href=""><img src="\img\20240403_joinAct\headerGoogle.png"></a>
                    <a class="ios" href=""><img src="\img\20240403_joinAct\headerIos.png"></a>
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
        <div class="sec01Text"></div>
        <div class="stepBox">
            <div class="stepBg">
                <div class="deco1"></div>
                <div class="deco2"></div>
                <p class="stepTitle">STEP.1</p>
                <p></p>
                <div v-if="login">
                    <!-- 已登入 -->
                    <p>您已登入掘夢網帳號</p>
                    <p class="account"></p>
                    <div class="logout"></div>
                </div>
                <div v-else>
                    <!-- 未登入 -->
                    <div class="login"></div>
                    <p><a href=""></a></p>
                </div>
            </div>
            <div class="stepBg">
                <div class="deco1"></div>
                <div class="deco2"></div>
                <p class="stepTitle">STEP.2</p>
                <div class="btnBox"></div>
            </div>
            <div class="stepBg">
                <div class="deco1"></div>
                <div class="deco2"></div>
                <p class="stepTitle">STEP.3</p>
                <p></p>
                <div class="fb"></div>
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
                    <img src="" alt="">
                    <select name="" id=""></select>
                </div>
                <div class="right">
                    <div class="iconBox"></div>
                    <div class="rewardBtn"></div>
                </div>
            </div>
            <div class="rewardM">
                <div class="topBox">
                    <img src="" alt="">
                    <div class="iconBox"></div>
                </div>
                <div class="rewardBtn"></div>
            </div>
        </div>
    </div>
    <div class="section sec02">
        <div class="box">
            <!-- <div class="sec02Title"><img src="/img/20240403_joinAct/sec02Title.png" alt=""></div> -->
            <div class="sec02Title"></div>
            <div class="sec02Text"></div>
        </div>
    </div>
</template>



<script>
export default {
    data() {
        return {
            login: false,

        }
    },
    methods: {

    },
    mounted() {

    }
};
</script>