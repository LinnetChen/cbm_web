<template>
    <div class="wrap">
        <div class="mask" v-if="this.mask == true" @click="close()"></div>

        <div class="popS" v-if="this.popS == true">
            <pre v-html="this.popSmsg"></pre>
            <button class="popClose" @click="close()"></button>
        </div>

        <div class="pop" v-if="this.pop == true">
            <button class="popClose" @click="close()"></button>
            <div class="noticeTitle">注意事項</div>
            <ul class="notice">
                <li>事前預約時間為即日起至5月5日當天(GMT+8) 23:59:59截止。</li>
                <li>
                    本活動限定台灣、香港、澳門地區的玩家參與，一組手機號碼僅限參加一次事前預約，參加者請確保手機號碼填寫正確。參與預約活動即表示同意個人資料蒐集使用及接收簡訊。
                </li>
                <li>
                    預約活動獎勵將會於遊戲上線後一周內，以郵件方式送到玩家遊戲內信箱。
                </li>
                <li>本活動贈送的虛寶獎勵，無法折換現金或等值商品。</li>
                <li>
                    玩家如因個人因素造成線路不穩、異常而無法正常參加活動，將無法額外進行補發獎勵。
                </li>
                <li>
                    活動期間系統若發生問題，本公司保留變更或終止本活動時間、內容之權利。​
                </li>
                <li>
                    官方將保留變更活動內容以及核准兌換與否之權利，詳細活動規則、獎勵及異動說明均以網站或FB公告最後一次公佈為準，請玩家密切留意網站公告訊息。活動開始後，所有玩家視同同意最後公告之內容。
                </li>
            </ul>
        </div>

        <div
            class="videoBox"
            v-if="this.videOpen == true"
            @click="closeVideo()"
        >
            <iframe
                id="player"
                type="text/html"
                width="600"
                height="360"
                :src="this.src"
                frameborder="0"
            ></iframe>
            >
        </div>

        <div id="fb-root"></div>

        <header class="header" id="header">
            <div class="menuBtn"></div>
            <div class="content">
                <div class="title"></div>
                <div class="typeBtn" v-if="this.user.device == 'PC'">
                    <a
                        href="https://play.google.com/store/apps/details?id=com.estgames.cm.tw"
                        class="google"
                        target="_blank"
                    >
                        <span><i class="effect"></i></span>
                    </a>
                    <a
                        href="https://apps.apple.com/TW/app/id6476968999"
                        class="appStore"
                        target="_blank"
                    >
                        <span><i class="effect"></i></span>
                    </a>
                </div>

                <div class="typeBtn" v-if="this.user.device !== 'PC'">
                    <a
                        v-if="this.user.device == 'android'"
                        href="https://play.google.com/store/apps/details?id=com.estgames.cm.tw"
                        class="google"
                        target="_blank"
                    >
                        <span><i class="effect"></i></span>
                    </a>
                    <a
                        v-if="this.user.device == 'iOS'"
                        href="https://apps.apple.com/TW/app/id6476968999"
                        class="appStore"
                        target="_blank"
                    >
                        <span><i class="effect"></i></span>
                    </a>
                </div>
                <div class="arrow"></div>
            </div>
        </header>

        <aside class="aside" :class="{ active: isAside }">
            <div class="asideBox">
                <div class="qrBox">
                    <p>掃描預約</p>
                    <img src="/img/prereg/qrcode.png" alt="雙平台掃描預約" />
                </div>
                <div class="typeBox" v-if="this.user.device == 'PC'">
                    <a
                        href="https://play.google.com/store/apps/details?id=com.estgames.cm.tw"
                        class="google"
                        target="_blank"
                    >
                        <span><i class="effect"></i></span>
                    </a>
                    <a
                        href="https://apps.apple.com/TW/app/id6476968999"
                        class="appStore"
                        target="_blank"
                    >
                        <span><i class="effect"></i></span>
                    </a>
                </div>

                <div class="typeBox" v-if="this.user.device !== 'PC'">
                    <a
                        v-if="this.user.device == 'android'"
                        href="https://play.google.com/store/apps/details?id=com.estgames.cm.tw"
                        class="google"
                        target="_blank"
                    >
                        <span><i class="effect"></i></span>
                    </a>
                    <a
                        v-if="this.user.device == 'iOS'"
                        href="https://apps.apple.com/TW/app/id6476968999"
                        class="appStore"
                        target="_blank"
                    >
                        <span><i class="effect"></i></span>
                    </a>
                </div>
                <div class="typeBox">
                    <a
                        href="https://www.facebook.com/DiGeamCabalM"
                        class="fb"
                        target="_blank"
                    ></a>
                </div>
                <a href="#header" class="goTop"></a>
            </div>
            <button
                class="asideBtn"
                :class="{ active: isAside }"
                @click="toggleAside"
            ></button>
        </aside>

        <div class="asideM">
            <div class="asideMbox">
                <button class="openList" @click="toggleNavBarList"></button>
                <a href="#header" class="goTop"></a>
                <a
                    href="https://www.facebook.com/DiGeamCabalM"
                    target="_blank"
                    class="fb"
                ></a>
            </div>
            <div class="typeBox">
                <a
                    v-if="this.user.device == 'android'"
                    href="https://play.google.com/store/apps/details?id=com.estgames.cm.tw"
                    class="google"
                    target="_blank"
                >
                    <span><i class="effect"></i></span>
                </a>
                <a
                    v-if="this.user.device == 'iOS'"
                    href="https://apps.apple.com/TW/app/id6476968999"
                    class="appStore"
                    target="_blank"
                >
                    <span><i class="effect"></i></span>
                </a>
            </div>
            <div class="char"></div>
        </div>

        <button class="navListBtn" @click="toggleNavBarList"></button>

        <div class="navBarList" :class="{ active: !isNavBarList }">
            <a href="###" class="logo"></a>
            <div class="linkBox">
                <a href="#header">首頁</a>
                <a href="#s1">事前預約</a>
                <a href="#s2">世界觀背景</a>
                <a href="#s3">職業介紹</a>
                <a href="#s4">遊戲特色</a>
                <a href="#s5">
                    手遊X端遊<br />
                    聯動特別活動
                </a>
            </div>
            <button class="closeBtn" @click="toggleNavBarList"></button>
        </div>

        <main class="main">
            <section class="sec01">
                <div
                    class="sub01"
                    data-aos="fade-down"
                    data-aos-offset="100"
                    data-aos-duration="100"
                >
                    <div id="s1"></div>
                </div>
                <div class="stepWrap">
                    <div class="left stepBox">
                        <div class="decoTop"></div>
                        <div class="stepTitleBox">
                            <div class="step"></div>
                            <p>輸入手機號碼</p>
                        </div>
                        <div class="stepBoxWrap" data-aos="fade-up">
                            <form action="" method="post">
                                <div class="phoneBox">
                                    <select
                                        name="phone_area"
                                        id="phone_area"
                                        value="+886"
                                        required
                                        v-model="user.moblieArea"
                                    >
                                        <option disabled value="">
                                            選擇區碼
                                        </option>
                                        <option value="+886">台灣(+886)</option>
                                        <option value="+852">香港(+852)</option>
                                        <option value="+853">澳門(+853)</option>
                                    </select>
                                    <input
                                        type="tel"
                                        maxlength="10"
                                        v-model="user.moblieNum"
                                        placeholder="912345678"
                                        required
                                    />
                                </div>

                                <div class="checkBox">
                                    <input
                                        type="checkbox"
                                        name="check"
                                        id="check"
                                        class="cheack"
                                        required
                                        v-model="user.read"
                                    />
                                    <label for="check"
                                        >勾選即同意
                                        <a
                                            href="http://www.digeam.com/terms2"
                                            target="_blank"
                                            >事前預約相關隱私權條款</a
                                        ></label
                                    >
                                </div>
                                <input
                                    class="submitBtn"
                                    :class="{ active: user.status }"
                                    type="button"
                                    @click="resever()"
                                    value=""
                                />
                            </form>
                            <div class="awardBox">
                                <img src="/img/prereg/giftPhone.png" alt="" />
                                <img src="/img/prereg/step1Gift.png" alt="" />
                            </div>
                            <button
                                class="s1Notice"
                                @click="popOpen()"
                            ></button>
                        </div>
                        <div class="decoDown"></div>
                    </div>

                    <div class="right stepBox">
                        <div class="stepBox2 stepBoxS">
                            <div class="decoTop"></div>
                            <div class="stepTitleBox">
                                <div class="step"></div>
                                <p>商店預約就送好禮</p>
                            </div>
                            <div
                                class="stepBoxWrap"
                                data-aos="fade-up"
                                data-aos-duration="700"
                            >
                                <div class="awardBox">
                                    <img
                                        src="img/prereg/step2Gift.png"
                                        alt=""
                                    />
                                </div>
                                <div
                                    class="typeBox"
                                    v-if="this.user.device == 'PC'"
                                >
                                    <a
                                        href="https://play.google.com/store/apps/details?id=com.estgames.cm.tw"
                                        class="google"
                                        target="_blank"
                                    >
                                        <span><i class="effect"></i></span>
                                    </a>
                                    <a
                                        href="https://apps.apple.com/TW/app/id6476968999"
                                        class="appStore"
                                        target="_blank"
                                    >
                                        <span><i class="effect"></i></span>
                                    </a>
                                </div>

                                <div
                                    class="typeBox"
                                    v-if="this.user.device !== 'PC'"
                                >
                                    <a
                                        v-if="this.user.device == 'android'"
                                        href="https://play.google.com/store/apps/details?id=com.estgames.cm.tw"
                                        class="google"
                                        target="_blank"
                                    >
                                        <span><i class="effect"></i></span>
                                    </a>
                                    <a
                                        v-if="this.user.device == 'iOS'"
                                        href="https://apps.apple.com/TW/app/id6476968999"
                                        class="appStore"
                                        target="_blank"
                                    >
                                        <span><i class="effect"></i></span>
                                    </a>
                                </div>
                            </div>

                            <div class="decoDown"></div>
                        </div>

                        <div class="stepBox3 stepBoxS">
                            <div class="decoTop"></div>
                            <div class="decoDown"></div>
                            <div class="stepTitleBox">
                                <div class="step"></div>
                                <p>追蹤粉絲團就送好禮</p>
                            </div>
                            <div
                                class="stepBoxWrap"
                                data-aos="fade-up"
                                data-aos-duration="800"
                            >
                                <div class="awardBox">
                                    <img
                                        src="/img/prereg/step3Gift.png"
                                        alt=""
                                    />
                                </div>
                                <div class="typeBox">
                                    <iframe
                                        src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FDiGeamCabalM&tabs=timeline&width=300&height=74&small_header=true&adapt_container_width=false&hide_cover=false&show_facepile=false&appId"
                                        width="250"
                                        height="74"
                                        style="border: none; overflow: hidden"
                                        scrolling="no"
                                        frameborder="0"
                                        allowfullscreen="true"
                                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                                    ></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="sec02">
                <div class="sec02Wrap">
                    <div class="sub02">
                        <div id="s2"></div>
                    </div>
                    <swiper
                        :navigation="{
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        }"
                        :pagination="{ clickable: true }"
                        :centeredSlides="true"
                        :loop="true"
                        :swiperOptions="{ speed: 500, autoplay: true }"
                        :modules="modules"
                    >
                        <swiper-slide
                            v-for="(item, idx) in slick02Data"
                            :key="idx"
                        >
                            <div class="item">
                                <img :src="item.img" alt="" class="item_img" />
                                <img
                                    :src="item.imgM"
                                    alt=""
                                    class="item_img_m"
                                />
                                <div class="item_box">
                                    <img
                                        :src="item.title"
                                        alt="item.titleAlt"
                                        class="item_title"
                                    />
                                    <p
                                        v-html="item.content"
                                        class="item_content"
                                    ></p>
                                </div>
                            </div>
                        </swiper-slide>
                        <div class="swiper_nav">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </swiper>
                </div>
            </section>
            <section class="sec03">
                <div
                    class="sub03"
                    data-aos="fade-left"
                    data-aos-offset="100"
                    data-aos-duration="100"
                >
                    <div id="s3"></div>
                </div>
                <div class="sec03Wrap">
                    <swiper
                        :navigation="{
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        }"
                        :thumbs="{ swiper: thumbsSwiper }"
                        :centeredSlides="true"
                        :centeredSlidesBounds="true"
                        :swiperOptions="{ speed: 400, autoplay: true }"
                        :modules="modules"
                        :loop="true"
                        class="swiper_char"
                    >
                        <swiper-slide
                            v-for="(item, idx) in slick03Data"
                            :key="idx"
                        >
                            <div class="charWrap">
                                <div class="char_box">
                                    <img
                                        :src="item.bgImg"
                                        alt=""
                                        class="bgImg"
                                    />
                                    <img
                                        :src="item.charImg"
                                        alt=""
                                        class="charImg"
                                    />
                                </div>
                                <div class="char_info">
                                    <div class="info1">
                                        <img
                                            :src="item.title"
                                            alt=""
                                            class="titleImg"
                                        />
                                        <img
                                            :src="item.linkImg"
                                            alt=""
                                            @click="videoId(idx)"
                                            class="linkImg"
                                        />
                                    </div>
                                    <div class="info2">
                                        <img
                                            src="/img/prereg/videoBut.png"
                                            alt=""
                                            @click="videoId(idx)"
                                            class="videoBut"
                                        />
                                        <div class="infoBox">
                                            <p>{{ item.sub }}</p>
                                            <p>{{ item.weapon }}</p>
                                        </div>
                                    </div>
                                    <div class="info3">
                                        <p>{{ item.content }}</p>
                                    </div>
                                </div>
                            </div>
                        </swiper-slide>
                    </swiper>
                    <div class="swiper_thumbs">
                        <swiper
                            @swiper="setThumbsSwiper"
                            :spaceBetween="20"
                            :slidesPerGroup="3"
                            :slidesPerView="6"
                            :loop="true"
                            :breakpoints="{
                                '320': {
                                    slidesPerGroup: 1,
                                    slidesPerView: 1,
                                },
                                '576': {
                                    slidesPerView: 3,
                                    slidesPerGroup: 3,
                                    spaceBetween: 0,
                                },
                                '768': {
                                    // slidesPerGroup: 3,
                                    slidesPerView: 4,
                                    spaceBetween: 0,
                                },
                                '1920': {
                                    slidesPerView: 6,
                                    spaceBetween: 0,
                                },
                            }"
                            :watchSlidesProgress="true"
                            :modules="modules"
                            class="swiper_tab"
                        >
                            <swiper-slide
                                v-for="(item, idx) in slick03tab"
                                :key="idx"
                                ><img :src="item.img" alt="" class="tab_img"
                            /></swiper-slide>
                        </swiper>
                        <div class="swiper_nav">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="sec04">
                <div
                    class="sub04"
                    data-aos="fade-left"
                    data-aos-offset="100"
                    data-aos-duration="100"
                >
                    <div id="s4"></div>
                </div>
                <div class="sec04Wrap" id="sec04">
                    <swiper
                        :navigation="true"
                        :pagination="{ clickable: true }"
                        :centeredSlides="true"
                        :loop="true"
                        :swiperOptions="{ speed: 500, autoplay: true }"
                        :modules="modules"
                    >
                        <swiper-slide
                            v-for="(item, idx) in slick04Data"
                            :key="idx"
                        >
                            <div class="item">
                                <img :src="item.img" alt="" class="item_img" />
                            </div>
                        </swiper-slide>
                    </swiper>
                </div>
            </section>
            <section class="sec05">
                <div
                    class="sub05"
                    data-aos="fade-left"
                    data-aos-offset="100"
                    data-aos-duration="100"
                >
                    <div id="s5"></div>
                </div>
                <div class="sec05Wrap" id="sec05">
                    <a
                        href="https://cbo.digeam.com/jointAct"
                        target="_blank"
                        rel="noopener noreferrer"
                        title="前往黑色契約手遊X端遊聯動頁"
                    >
                        <img
                            src="/img/prereg/s5Photo.png"
                            alt="黑色契約與黑色契約M聯動確定"
                        />
                    </a>
                    <div class="contentBox">
                        <p>
                            坐著玩、站著玩、走著玩還是躺著好玩！​<br />
                            聯動端遊與手遊帳號，領取超稀有時裝和坐騎！​
                        </p>
                    </div>
                </div>
            </section>
        </main>

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
                <a href="https://www.digeam.com/terms2" target="_blank"
                    >隱私條款</a
                >

                <a href="https://www.digeam.com/cs" target="_blank">客服中心</a>
                <p class="Copyright">
                    Copyright © ESTgames Corp. All rights reserved.​ 2023
                    Licensed and published for Taiwan, Hong Kong and Macau by
                    DiGeam Co.,Ltd​ CABAL Online is a registered trademark of
                    ESTgames Corp (and the logo of ESTgames).​
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
    </div>
</template>

<script>
import { ref } from "vue";
import { Swiper, SwiperSlide } from "swiper/vue";
import { Navigation, Pagination, Thumbs } from "swiper/modules";
import AOS from "aos";
import "aos/dist/aos.css";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import "swiper/css/effect-fade";

let api = "https://cbm.digeam.com/api/prereg";

// let api = "http://192.168.0.42:8081/api/prereg";

export default {
    components: {
        Swiper,
        SwiperSlide,
    },
    setup() {
        const thumbsSwiper = ref(null);
        const setThumbsSwiper = (swiper) => {
            thumbsSwiper.value = swiper;
        };

        return {
            thumbsSwiper,
            setThumbsSwiper,
            modules: [Navigation, Pagination, Thumbs],
        };
    },
    data: function () {
        return {
            slick02Data: [
                {
                    img: "/img/prereg/s2Photo01.png",
                    imgM: "/img/prereg/s2Photo01_m.png",
                    title: "/img/prereg/s2TitleInner01.png",
                    titleAlt: "祂的存在",
                    content:
                        "沒人知道祂誕生何處與來自哪裡。是生命？亦或是機械？甚至連是否真實存在，都不得而知。<br><br>祂的目的，是創造一個「更加完整」的世界。為此，祂挑選了能延續後代的「種族」，並觀察他們的文明發展，最後在做出評價後破壞殆盡。在這漫長的時間洪流中，祂就這樣不停地持續著。祂還將名為「絕對萬靈磁心」的工具交予祂選上的種族，以協助他們發展成更完整的文明。",
                },
                {
                    img: "/img/prereg/s2Photo02.png",
                    imgM: "/img/prereg/s2Photo02_m.png",
                    title: "/img/prereg/s2TitleInner02.png",
                    titleAlt: "絕對萬靈磁心 ",
                    content:
                        "絕對萬靈磁心象徵著權能與力量。此外，它既是知識，也是各文明發展與滅亡的紀錄。<br><br>要使用絕對萬靈磁心需要擁有特殊的資格。依據資格的高低，能掌握的能力也有所不同。絕對萬靈磁心的外型長什麼樣子，以及是否擁有實體等，這些資訊都只有獲得絕對萬靈磁心的人才會知道。也有人認為，當絕對萬靈磁心遇上擁有資格的人，會被吸收至其遺傳基因中，並世世代代傳承。",
                },
                {
                    img: "/img/prereg/s2Photo03.png",
                    imgM: "/img/prereg/s2Photo03_m.png",
                    title: "/img/prereg/s2TitleInner03.png",
                    titleAlt: "原始時代，一個令人尊敬的時代",
                    content:
                        "在這個時代，力量與核心科技的相關研究達到了頂峰。<br><br>對比過去紀錄全部遺失而不可考的「失落時代」，這個時代被評價為「值得為後世尊敬的時代」。就是在這個時期，出現了名為「白士德博士」的天才科學家。他完善了統一場理論，並將所有能量總結為「第5種力量」。他認為，只要妥善運用這種力量，人類的潛力就能得到無限的發展。",
                },
                {
                    img: "/img/prereg/s2Photo04.png",
                    imgM: "/img/prereg/s2Photo04_m.png",
                    title: "/img/prereg/s2TitleInner04.png",
                    titleAlt: "大破壞與聖．瓦倫丁",
                    content:
                        "沒有人知道「大破壞」的起因是不是因為超能力的失衡，也沒有人知道這究竟是誰、又是怎麼造成的。<br><br>據傳當時天空與大地都竄出了人類未曾見過的魔物，同時世界各地出現海嘯、地震、火山爆發等一連串天災，人們卻無能為力。超能力者「聖．瓦倫丁」在此時挺身而出，表示大破壞是由一個名為「魔王」的存在帶來的，而他決定犧牲自己來封印魔王，同時在臨終之時，留下「魔王終將復活」的預言。",
                },
                {
                    img: "/img/prereg/s2Photo05.png",
                    imgM: "/img/prereg/s2Photo05_m.png",
                    title: "/img/prereg/s2TitleInner05.png",
                    titleAlt: "踏上道路的人們",
                    content:
                        "聖．瓦倫丁在封印魔王並臨終之時，留下了一句警告。<br><br>他預言1000年後，當他力量耗盡時，魔王將會復活。賢者之塔的大賢者西里烏斯意識到預言的這天即將到來，於是在他的主導之下，大陸各地紛紛設立起特殊管理殖民地。這些特殊管理殖民地都位於氣候條件嚴苛的地方，並派遣了具有能力的官員與教官駐守。在修恩大陸的特殊管理殖民地呼嘯沙漠上，一位名為馬克的男子稱我是他一直在等待的「戰士之星」，並要我跟隨命運，踏上拯救世界的道路...... ",
                },
            ],
            slick03Data: [
                {
                    bgImg: "/img/prereg/WarriorBling.png",
                    charImg: "/img/prereg/Warrior.png",
                    charName: "/img/prereg/WarriorText.png",
                    title: "/img/prereg/WarriorText.png",
                    weapon: "武器：巨劍、大刀",
                    sub: "超強的劍術，近戰中的支配者",
                    content:
                        "狂劍士先天就具備強壯的體格，崇尚強大的力量而不是技巧與速度，鍛鍊目標是為了徹底掌控身體，因此不需要培養魔力的理解能力，每次攻擊都帶來極強的破壞力，讓敵人不得不退避三舍。",
                    linkImg: "/img/prereg/WarriorVideo.png",
                },
                {
                    bgImg: "/img/prereg/BladerBling.png",
                    charImg: "/img/prereg/Blader.png",
                    charName: "/img/prereg/BladerText.png",
                    title: "/img/prereg/BladerText.png",
                    weapon: "武器：單手刀、劍",
                    sub: "絢爛與速度相結合的刀術",
                    content:
                        "雙劍士追求精湛的技巧與敏捷的速度，有著超乎常人的反應能力，利用極高的敏捷特性在戰場上迅速穿梭，極快的速度讓他們能夠產生分身幻象擾亂敵人視線，讓敵人難以抓住他的身影，創造絕佳的攻擊機會。",
                    linkImg: "/img/prereg/BladerVideo.png",
                },
                {
                    bgImg: "/img/prereg/ForceShielderBling.png",
                    charImg: "/img/prereg/ForceShielder.png",
                    charName: "/img/prereg/ForceShielderText.png",
                    title: "/img/prereg/ForceShielderText.png",
                    weapon: "武器：單手刀",
                    sub: "意志與信念並存的防禦者",
                    content:
                        "盾劍士渴望極強的防禦能力，不滿足於穿戴防禦力較高的重型盔甲，他們嘗試將魔力運用在防禦上，讓武器轉變為星之盾，開創出新的魔力運用方式。成為擁有絕對防禦能力的戰士。",
                    linkImg: "/img/prereg/ForceShielderVideo.png",
                },
                {
                    bgImg: "/img/prereg/ForceBladerBling.png",
                    charImg: "/img/prereg/ForceBlader.png",
                    charName: "/img/prereg/ForceBladerText.png",
                    title: "/img/prereg/ForceBladerText.png",
                    weapon: "武器：單手刀",
                    sub: "魔法與劍並存的暗殺者",
                    content:
                        "魔劍士在一次次研究中，成功將魔法與劍術結合，發展出高超的戰鬥方式，每次攻擊帶來強大的破壞力，但由於需要同時使用兩種戰鬥方式的力量，因此在培養訓練上需要花費較多心力。",
                    linkImg: "/img/prereg/ForceBladerVideo.png",
                },
                {
                    bgImg: "/img/prereg/WizardBling.png",
                    charImg: "/img/prereg/Wizard.png",
                    charName: "/img/prereg/WizardText.png",
                    title: "/img/prereg/WizardText.png",
                    weapon: "武器：魔徽",
                    sub: "絕對的破壞力，魔法的支配者",
                    content:
                        "魔導師是掌握著魔法、爆發力和超級強大破壞力的絕對強者。他們可以隨心所欲地操控體內魔力與自然之力共鳴，甚至於同時施展多種魔法，將其化為毀滅性的魔法攻擊，破壞力足以令敵人望而生畏。",
                    linkImg: "/img/prereg/WizardVideo.png",
                },
                {
                    bgImg: "/img/prereg/ForceArcherBling.png",
                    charImg: "/img/prereg/ForceArcher.png",
                    charName: "/img/prereg/ForceArcherText.png",
                    title: "/img/prereg/ForceArcherText.png",
                    weapon: "武器：星紋",
                    sub: "穿過暴風的致命一擊",
                    content:
                        "弓箭手起源於魔導師，將魔力轉化為箭矢造成巨大的破壞力，而靈活性是他們最大的優勢之一，在戰場上輕鬆改變位置和躲避敵人的攻擊，憑藉著靈活的身手和卓越的射擊技巧，強大的遠程支援成為戰場上勝利的關鍵。",
                    linkImg: "/img/prereg/ForceArcherVideo.png",
                },
            ],
            slick03tab: [
                {
                    img: "/img/prereg/s3Btn01Hover.png",
                },
                {
                    img: "/img/prereg/s3Btn02Hover.png",
                },
                {
                    img: "/img/prereg/s3Btn03Hover.png",
                },
                {
                    img: "/img/prereg/s3Btn04Hover.png",
                },
                {
                    img: "/img/prereg/s3Btn05Hover.png",
                },
                {
                    img: "/img/prereg/s3Btn06Hover.png",
                },
            ],
            slick04Data: [
                {
                    img: "/img/prereg/s4Photo01.png",
                },
                {
                    img: "/img/prereg/s4Photo02.png",
                },
                {
                    img: "/img/prereg/s4Photo03.png",
                },
                {
                    img: "/img/prereg/s4Photo04.png",
                },
                {
                    img: "/img/prereg/s4Photo05.png",
                },
            ],
            mask: false,
            pop: false,
            popS: false,
            popSmsg: "",
            videOpen: false,
            noticeOpen: false,
            isAside: false,
            isNavBarList: false,
            src: "",
            user: {
                status: false,
                moblieArea: "",
                moblieNum: "",
                read: false,
                device: "",
            },
        };
    },
    methods: {
        videoId(idx) {
            this.mask = true;
            this.videOpen = true;
            let id = "";
            switch (idx) {
                case 0:
                    id = "9nolxJjTmZQ";
                    break;
                case 1:
                    id = "5sYIlYpAQNU";
                    break;
                case 2:
                    id = "Gm1DfYKWVqU";
                    break;
                case 3:
                    id = "p7ucdOrt-4I";
                    break;
                case 4:
                    id = "czCbTzStADw";
                    break;
                case 5:
                    id = "tyS3vfKZ39U";
                    break;
                default:
                    break;
            }
            this.src = "https://www.youtube.com/embed/" + id;
        },
        isMobileDevice() {
            let width = window.innerWidth;
            if (width > 768) {
                this.user.device = "PC";
            } else {
                let ua = navigator.userAgent;
                let android =
                    ua.indexOf("Android") > -1 || ua.indexOf("Adr") > -1; // android
                let iOS = !!ua.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); // ios
                if (android == true) {
                    this.user.device = "android";
                } else if (iOS == true) {
                    this.user.device = "iOS";
                }
            }
        },
        async resever() {
            let area = this.user.moblieArea;
            let mobile = this.user.moblieNum;
            let read = this.user.read;

            if (this.user.status) {
                return;
            }

            if (read == false) {
                this.mask = true;
                this.popS = true;
                this.popSmsg = "請勾選即同意事前預約相關隱私權條款";
                return;
            } else if (
                area == "+886" &&
                mobile.length == 9 &&
                !isNaN(mobile) &&
                mobile.substring(0, 1) == 9
            ) {
            } else if (
                area == "+886" &&
                mobile.length == 10 &&
                !isNaN(mobile) &&
                mobile.substring(0, 1) == 0
            ) {
                this.user.moblieNum = mobile.substring(1, 11);
            } else if (
                (area == "+852" || area == "+853") &&
                mobile.length == 8 &&
                !isNaN(mobile)
            ) {
            } else {
                this.mask = true;
                this.popS = true;
                this.popSmsg =
                    "請填寫正確手機號碼<br/>​台灣區，不含特殊符號的半形數字10碼<br/>​港/澳區，不含特殊符號的半形數字8碼";
                return;
            }
            try {
                const res = await axios.post(api, {
                    type: "reserve",
                    phone: this.user.moblieArea + this.user.moblieNum,
                    phone_type: this.user.device,
                });
                this.mask = true;
                this.popS = true;
                res.data.status == 1
                    ? (this.popSmsg = "恭喜預約成功！")
                    : res.data.status == -99
                    ? ((this.popSmsg = "此號碼已預約！"),
                      (this.user.status = true))
                    : res.data.status == -97
                    ? (this.popSmsg =
                          "請稍後再進行預約<br/>同一個IP，一小時內只能預約三次")
                    : (this.popSmsg = "活動已結束");
                res.data.status == 1
                    ? ((this.user.status = true), (this.user.moblieNum = ""))
                    : "";
                return res;
            } catch (err) {
                console.error(err);
            } finally {
                // setTimeout(() => {
                //     this.mask = false;
                // }, 2000);
            }
        },
        popOpen() {
            this.mask = true;
            this.pop = true;
        },
        close() {
            this.mask = false;
            this.videOpen = false;
            this.pop = false;
            this.popS = false;
        },
        closeVideo() {
            this.mask = false;
            this.videOpen = false;
        },
        toggleAside() {
            this.isAside = !this.isAside;
        },
        toggleNavBarList() {
            this.isNavBarList = !this.isNavBarList;
        },
    },
    mounted() {
        this.isMobileDevice();
        AOS.init();
        let width = window.innerWidth;
        if (width <= 576) {
            window.onscroll = function () {
                var asideM = document.querySelector(".asideM");
                if (window.scrollY > 500) {
                    console.log("超過了");
                    asideM.classList.add("active");
                } else {
                    console.log("還沒開");
                    asideM.classList.remove("active");
                }
            };
        }
    },
};
</script>
