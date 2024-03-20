<!-- <script setup>

</script> -->

<template>
    <div class="wrap">
        <div class="mask" v-if="this.mask == true"></div>

        <div
            class="videoBox"
            v-if="this.videOpen == true"
            @click="closeVideo()"
        >
            <iframe
                id="player"
                type="text/html"
                width="640"
                height="390"
                src="https://www.youtube.com/embed/5glPHD3Dsoo"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen
            ></iframe>
        </div>

        <!-- <div id="fb-root"></div> -->
        <header class="header">
            <div class="menuBtn"></div>
            <div class="content">
                <div class="title"></div>
                <div class="typeBtn">
                    <a href="" class="google" target="_blank"></a>
                    <a href="" class="ios" target="_blank"></a>
                </div>
                <div class="arrow"></div>
            </div>
        </header>

        <main class="main">
            <section class="sec01">
                <div class="sub01"></div>
                <div class="stepWrap">
                    <div class="left stepBox">
                        <div class="stepBoxWrap">
                            <form action="" method="post">
                                <div class="phoneBox">
                                    <select
                                        name="phone_area"
                                        id="phone_area"
                                        required
                                    >
                                        <option value="+886">台灣(+886)</option>
                                        <option value="+852">香港(+852)</option>
                                        <option value="+853">澳門(+853)</option>
                                    </select>
                                    <input type="tel" maxlength="10" required />
                                </div>
                                <div class="checkBox">
                                    <input
                                        type="checkbox"
                                        name="check"
                                        id="check"
                                        class="cheack"
                                        required
                                    />
                                    <label for="check"
                                        >勾選即同意<a href="http://"
                                            >事前預約相關隱私權條款</a
                                        ></label
                                    >
                                </div>
                                <input
                                    class="submitBtn"
                                    type="submit"
                                    value=""
                                />
                            </form>
                            <div class="awardBox">
                                <img src="/img/prereg/giftPhone.png" alt="" />
                                <img src="/img/prereg/giftPhone.png" alt="" />
                            </div>
                            <button class="s1Notice"></button>
                        </div>
                    </div>
                    <div class="right stepBox">
                        <div class="stepBox2 stepBoxS">
                            <div class="stepBoxWrap">
                                <div class="awardBox">
                                    <img
                                        src="/img/prereg/giftPhone2.png"
                                        alt=""
                                    />
                                </div>
                                <div class="typeBtn">
                                    <a
                                        href=""
                                        class="google"
                                        target="_blank"
                                    ></a>
                                    <a href="" class="ios" target="_blank"></a>
                                </div>
                            </div>
                        </div>

                        <div class="stepBox3 stepBoxS">
                            <div class="stepBoxWrap">
                                <div class="awardBox">
                                    <img
                                        src="/img/prereg/giftPhone2.png"
                                        alt=""
                                    />
                                </div>
                                <div class="typeBtn">
                                    <div
                                        class="fb-page"
                                        data-href="https://www.facebook.com/DiGeamCabalM"
                                        data-tabs="timeline"
                                        data-width="225"
                                        data-height="75"
                                        data-small-header="true"
                                        data-adapt-container-width="false"
                                        data-hide-cover="false"
                                        data-show-facepile="false"
                                    >
                                        <blockquote
                                            cite="https://www.facebook.com/DiGeamCabalM"
                                            class="fb-xfbml-parse-ignore"
                                        >
                                            <a
                                                href="https://www.facebook.com/DiGeamCabalM"
                                                >黑色契約 Mobile</a
                                            >
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="sec02">
                <div class="sec02Wrap">
                    <div class="sub02"></div>
                    <swiper
                        :navigation="true"
                        :pagination="{ clickable: true }"
                        :centeredSlides="true"
                        :swiperOptions="{ speed: 500, autoplay: true }"
                        :modules="modules"
                    >
                        <swiper-slide
                            v-for="item in slick02Data"
                            :key="slick02Data.id"
                        >
                            <div class="item">
                                <img :src="item.img" alt="" class="item_img" />
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
                    </swiper>
                </div>
            </section>
            <section class="sec03">
                <div class="sub03"></div>
                <!-- <div class="stepWrap">
                    <swiper
                        :navigation="{
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        }"
                        :pagination="{
                            clickable: true,
                            el: '.swiper-pagination',
                        }"
                        :centeredSlides="true"
                        :swiperOptions="{ speed: 400, autoplay: true }"
                        :modules="modules"
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
                                            @click="onYouTubeIframeAPIReady()"
                                            class="linkImg"
                                        />
                                    </div>
                                    <div class="info2">
                                        <p>{{ item.sub }}</p>
                                        <p>{{ item.weapon }}</p>
                                    </div>
                                    <div class="info3">
                                        <p>{{ item.content }}</p>
                                    </div>
                                </div>
                            </div>
                        </swiper-slide>
                        <div class="swiper-other">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </swiper>
                </div> -->
                <div class="stepWrap">
                    <swiper
                        class="swiperFrist"
                        :onSwiper="onSwiperFirst"
                        @slideChange="onSlideChange"
                        :centeredSlides="true"
                        :swiperOptions="{ speed: 400, autoplay: true }"
                        :modules="modules"
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
                                            @click="onYouTubeIframeAPIReady()"
                                            class="linkImg"
                                        />
                                    </div>
                                    <div class="info2">
                                        <p>{{ item.sub }}</p>
                                        <p>{{ item.weapon }}</p>
                                    </div>
                                    <div class="info3">
                                        <p>{{ item.content }}</p>
                                    </div>
                                </div>
                            </div>
                        </swiper-slide>
                        <!-- <div class="swiper-other">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-next"></div>
                        </div> -->
                    </swiper>
                    <swiper
                        class="swiperTab"
                        :onSwiper="onSwiperSecond"
                        @slideChange="onSlideChange"
                        :navigation="true"
                        :centeredSlides="true"
                        :swiperOptions="{ speed: 400, autoplay: true }"
                        :modules="modules"
                        :slides-per-view="6"
                        :space-between="50"
                    >
                        <swiper-slide
                            v-for="(item, idx) in slick03Tab"
                            :key="idx"
                        >
                            <img :src="item.img" alt="" />
                        </swiper-slide>
                    </swiper>
                </div>
            </section>
        </main>
    </div>
</template>

<script>
import { ref } from "vue";
import { Swiper, SwiperSlide } from "swiper/vue";
import { Navigation, Pagination } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import "swiper/css/effect-fade";

const firstSwiper = ref(null);
const secondSwiper = ref(null);
export default {
    components: {
        Swiper,
        SwiperSlide,
    },
    data: function () {
        return {
            modules: [Navigation, Pagination],
            slick02Data: [
                {
                    img: "/img/prereg/s2Photo01.png",
                    title: "/img/prereg/s2TitleInner01.png",
                    titleAlt: "祂的存在",
                    content:
                        "沒人知道祂誕生何處與來自哪裡。是生命？亦或是機械？甚至連是否真實存在，都不得而知。<br><br>祂的目的，是創造一個「更加完整」的世界。為此，祂挑選了能延續後代的「種族」，並觀察他們的文明發展，最後在做出評價後破壞殆盡。在這漫長的時間洪流中，祂就這樣不停地持續著。祂還將名為「絕對萬靈磁心」的工具交予祂選上的種族，以協助他們發展成更完整的文明。",
                },
                {
                    img: "/img/prereg/s2Photo02.png",
                    title: "/img/prereg/s2TitleInner02.png",
                    titleAlt: "絕對萬靈磁心 ",
                    content:
                        "絕對萬靈磁心象徵著權能與力量。此外，它既是知識，也是各文明發展與滅亡的紀錄。<br><br>要使用絕對萬靈磁心需要擁有特殊的資格。依據資格的高低，能掌握的能力也有所不同。絕對萬靈磁心的外型長什麼樣子，以及是否擁有實體等，這些資訊都只有獲得絕對萬靈磁心的人才會知道。也有人認為，當絕對萬靈磁心遇上擁有資格的人，會被吸收至其遺傳基因中，並世世代代傳承。",
                },
                {
                    img: "/img/prereg/s2Photo03.png",
                    title: "/img/prereg/s2TitleInner03.png",
                    titleAlt: "原始時代，一個令人尊敬的時代",
                    content:
                        "在這個時代，力量與核心科技的相關研究達到了頂峰。<br><br>對比過去紀錄全部遺失而不可考的「失落時代」，這個時代被評價為「值得為後世尊敬的時代」。就是在這個時期，出現了名為「白士德博士」的天才科學家。他完善了統一場理論，並將所有能量總結為「第5種力量」。他認為，只要妥善運用這種力量，人類的潛力就能得到無限的發展。",
                },
                {
                    img: "/img/prereg/s2Photo04.png",
                    title: "/img/prereg/s2TitleInner04.png",
                    titleAlt: "大破壞與聖．瓦倫丁",
                    content:
                        "沒有人知道「大破壞」的起因是不是因為超能力的失衡，也沒有人知道這究竟是誰、又是怎麼造成的。<br><br>據傳當時天空與大地都竄出了人類未曾見過的魔物，同時世界各地出現海嘯、地震、火山爆發等一連串天災，人們卻無能為力。超能力者「聖．瓦倫丁」在此時挺身而出，表示大破壞是由一個名為「魔王」的存在帶來的，而他決定犧牲自己來封印魔王，同時在臨終之時，留下「魔王終將復活」的預言。",
                },
                {
                    img: "/img/prereg/s2Photo05.png",
                    title: "/img/prereg/s2TitleInner05.png",
                    titleAlt: "踏上道路的人們",
                    content:
                        "聖．瓦倫丁在封印魔王並臨終之時，留下了一句警告。<br><br>他預言1000年後，當他力量耗盡時，魔王將會復活。賢者之塔的大賢者西里烏斯意識到預言的這天即將到來，於是在他的主導之下，大陸各地紛紛設立起特殊管理殖民地。這些特殊管理殖民地都位於氣候條件嚴苛的地方，並派遣了具有能力的官員與教官駐守。在修恩大陸的特殊管理殖民地呼嘯沙漠上，一位名為馬克的男子稱我是他一直在等待的「戰士之星」，並要我跟隨命運，踏上拯救世界的道路...... ",
                },
            ],
            slick03Data: [
                {
                    bgImg: "/img/prereg/WarriorBling1.png",
                    charImg: "/img/prereg/Warrior.png",
                    charName: "/img/prereg/WarriorText.png",
                    title: "/img/prereg/WarriorText.png",
                    weapon: "武器：巨劍、大刀",
                    sub: "超強的劍術，近戰中的支配者",
                    content:
                        "狂劍士先天就具備強壯的體格，崇尚強大的力量而不是技巧與速度，鍛鍊目標是為了徹底掌控身體，因此不需要培養魔力的理解能力，每次攻擊都帶來極強的破壞力，讓敵人不得不退避三舍。",
                    linkImg: "/img/prereg/WarriorVideo.png",
                    link: "https://youtu.be/9nolxJjTmZQ",
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
                    link: "https://youtu.be/5sYIlYpAQNU",
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
                    link: "https://youtu.be/Gm1DfYKWVqU",
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
                    link: "https://youtu.be/p7ucdOrt-4I",
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
                    link: "https://youtu.be/czCbTzStADw",
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
                    link: "https://youtu.be/tyS3vfKZ39U",
                },
            ],
            slick03Tab: [
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
            mask: false,
            videOpen: false,
            src: "https://www.youtube.com/watch?v=bHQqvYy5KYo",
        };
    },
    methods: {
        onYouTubeIframeAPIReady() {
            this.mask = true;
            this.videOpen = true;
            var player;
            var player = new YT.Player("player", {
                height: "390",
                width: "640",
                videoId: "M7lc1UVf-VE",
                playerVars: {
                    playsinline: 1,
                },
                events: {
                    onReady: this.onPlayerReady,
                    onStateChange: this.onPlayerStateChange,
                },
            });
        },
        onPlayerReady(event) {
            event.target.playVideo();
        },
        onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.PLAYING && !done) {
                setTimeout(stopVideo, 6000);
                done = true;
            }
        },
        closeVideo() {
            this.mask = false;
            this.videOpen = false;
        },
        onSwiperFirst(swiper) {
            firstSwiper.value = swiper;
        },
        onSwiperSecond(swiper) {
            secondSwiper.value = swiper;
        },
        onSlideChange(swiper) {
            if (swiper === firstSwiper.value) {
                secondSwiper.value.slideTo(swiper.activeIndex);
            } else if (swiper === secondSwiper.value) {
                firstSwiper.value.slideTo(swiper.activeIndex);
            }
        },
    },
    mounted() {
        var tag = document.createElement("script");
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName("script")[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    },
};
</script>
