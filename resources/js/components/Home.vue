<template>
    <div class="container-fluid">
        <div id="wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="logos">
                        <div class="logo-item">
                            <img src="/img/1.png">
                        </div>
                        <div class="logo-item">
                            <img src="/img/2.png">
                        </div>
                        <div class="logo-item">
                            <img src="/img/3.png">
                        </div>
                        <div class="logo-item">
                            <img src="/img/4.png">
                        </div>
                        <div class="logo-item">
                            <img src="/img/5.png">
                        </div>
                        <div class="logo-item">
                            <img src="/img/6.png">
                        </div>
                    </div>
                    <div class="header">
                        <h1 id="h1">
                            Уважаемые посетители шоурума,
                            <br>просим Вас выбрать наиболее понравившийся вариант отделки квартиры
                        </h1>
                    </div>
                </div>
            </div>

            <div id="step1" class="row">
                <div class="col-4">
                    <p class="name_title">{{ type1.name }}</p>
                    <swiper ref="IndexSwiper1" :options="swiperOptionsIndex1">
                        <swiper-slide v-for="(galleryItem, index) in type1.gallery" class="swiper-slide">
                            <div @click="openModal(type1.id, index)" class="swiper-slide-inner" v-bind:style="{ 'background-image': 'url(' + galleryItem + ')' }"></div>
                        </swiper-slide>
                    </swiper>
                    <button class="swiper-button-prev IndexSwiper1_prev"></button>
                    <button class="swiper-button-next IndexSwiper1_next"></button>
                    <div class="score">
                        <button @click="Score(type1)" :id="'btn'+type1.id" class="btn btn-score">Голосовать</button>
                        <!--{{ type1.score }}-->
                    </div>
                </div>
                <div :id="'modal' + type1.id" class="modal">
                    <swiper ref="DetailSwiper1" :options="swiperOptionsDetail1">
                        <swiper-slide v-for="galleryItem in type1.gallery" :key="galleryItem">
                            <img :src="galleryItem">
                        </swiper-slide>
                    </swiper>
                    <button class="swiper-button-prev DetailSwiper1_prev"></button>
                    <button class="swiper-button-next DetailSwiper1_next"></button>
                    <button @click="closeModal(type1.id)" class="close">&times;</button>
                </div>

                <div class="col-4">
                    <p class="name_title">{{ type2.name }}</p>
                    <swiper ref="IndexSwiper2" :options="swiperOptionsIndex2">
                        <swiper-slide v-for="(galleryItem, index) in type2.gallery" class="swiper-slide">
                            <div @click="openModal(type2.id, index)" class="swiper-slide-inner" v-bind:style="{ 'background-image': 'url(' + galleryItem + ')' }"></div>
                        </swiper-slide>
                    </swiper>
                    <button class="swiper-button-prev IndexSwiper2_prev"></button>
                    <button class="swiper-button-next IndexSwiper2_next"></button>
                    <div class="score">
                        <button @click="Score(type2)" :id="'btn'+type2.id" class="btn btn-score">Голосовать</button>
                        <!--{{ type2.score }}-->
                    </div>
                </div>
                <div :id="'modal' + type2.id" class="modal">
                    <swiper ref="DetailSwiper2" :options="swiperOptionsDetail2">
                        <swiper-slide v-for="galleryItem in type2.gallery" :key="galleryItem">
                            <img :src="galleryItem">
                        </swiper-slide>
                    </swiper>
                    <button class="swiper-button-prev DetailSwiper2_prev"></button>
                    <button class="swiper-button-next DetailSwiper2_next"></button>
                    <button @click="closeModal(type2.id)" class="close">&times;</button>
                </div>

                <div class="col-4">
                    <p class="name_title">{{ type3.name }}</p>
                    <swiper ref="IndexSwiper3" :options="swiperOptionsIndex3">
                        <swiper-slide v-for="(galleryItem, index) in type3.gallery" class="swiper-slide">
                            <div @click="openModal(type3.id, index)" class="swiper-slide-inner" v-bind:style="{ 'background-image': 'url(' + galleryItem + ')' }"></div>
                        </swiper-slide>
                    </swiper>
                    <button class="swiper-button-prev IndexSwiper3_prev"></button>
                    <button class="swiper-button-next IndexSwiper3_next"></button>
                    <div class="score">
                        <button @click="Score(type3)" :id="'btn'+type3.id" class="btn btn-score">Голосовать</button>
                        <!--{{ type3.score }}-->
                    </div>
                </div>
                <div :id="'modal' + type3.id" class="modal">
                    <swiper ref="DetailSwiper3" :options="swiperOptionsDetail3">
                        <swiper-slide v-for="galleryItem in type3.gallery" :key="galleryItem">
                            <img :src="galleryItem">
                        </swiper-slide>
                    </swiper>
                    <button class="swiper-button-prev DetailSwiper3_prev"></button>
                    <button class="swiper-button-next DetailSwiper3_next"></button>
                    <button @click="closeModal(type3.id)" class="close">&times;</button>
                </div>
                <div class="col-12" style="text-align:center;">
                    <button @click="openCommentForm()" style="background: none; color: rgb(46, 84, 142); box-shadow: none; border: 0.15vh solid rgb(46, 84, 142); padding: 1.5vh 5vh; font-size: 2vh; font-weight: bold; margin-top: 1vh; border-radius: 1vh;">Оставить пожелание</button>
                </div>
            </div>

            <div id="step2" class="row">
                <div class="col-4" style="margin-left: 16.5vw;">
                    <p class="name_title">{{ roof1.name }}</p>
                    <swiper ref="IndexRoofSwiper1" :options="swiperOptionsIndexRoof1">
                        <swiper-slide v-for="(galleryItem, index) in roof1.gallery" class="swiper-slide">
                            <div @click="openModal(roof1.id, index)" class="swiper-slide-inner" v-bind:style="{ 'background-image': 'url(' + galleryItem + ')' }"></div>
                        </swiper-slide>
                    </swiper>
                    <!--<button class="swiper-button-prev IndexRoofSwiper1_prev"></button>
                    <button class="swiper-button-next IndexRoofSwiper1_next"></button>-->
                    <div class="score">
                        <button @click="ScoreRoof(roof1)" :id="'btn'+roof1.id" class="btn btn-score">Голосовать</button>
                        <!--{{ type1.score }}-->
                    </div>
                </div>
                <div :id="'modal' + roof1.id" class="modal">
                    <swiper ref="DetailRoofSwiper1" :options="swiperOptionsDetailRoof1">
                        <swiper-slide v-for="galleryItem in roof1.gallery" :key="galleryItem">
                            <img :src="galleryItem">
                        </swiper-slide>
                    </swiper>
                    <!--<button class="swiper-button-prev DetailRoofSwiper1_prev"></button>
                    <button class="swiper-button-next DetailRoofSwiper1_next"></button>-->
                    <button @click="closeModal(roof1.id)" class="close">&times;</button>
                </div>

                <div class="col-4">
                    <p class="name_title">{{ roof2.name }}</p>
                    <swiper ref="IndexRoofSwiper2" :options="swiperOptionsIndexRoof2">
                        <swiper-slide v-for="(galleryItem, index) in roof2.gallery" class="swiper-slide">
                            <div @click="openModal(roof2.id, index)" class="swiper-slide-inner" v-bind:style="{ 'background-image': 'url(' + galleryItem + ')' }"></div>
                        </swiper-slide>
                    </swiper>
                    <!--<button class="swiper-button-prev IndexRoofSwiper2_prev"></button>
                    <button class="swiper-button-next IndexRoofSwiper2_next"></button>-->
                    <div class="score">
                        <button @click="ScoreRoof(roof2)" :id="'btn'+roof2.id" class="btn btn-score">Голосовать</button>
                        <!--{{ type2.score }}-->
                    </div>
                </div>
                <div :id="'modal' + roof2.id" class="modal">
                    <swiper ref="DetailRoofSwiper2" :options="swiperOptionsDetail2">
                        <swiper-slide v-for="galleryItem in roof2.gallery" :key="galleryItem">
                            <img :src="galleryItem">
                        </swiper-slide>
                    </swiper>
                    <!--<button class="swiper-button-prev DetailRoofSwiper2_prev"></button>
                    <button class="swiper-button-next DetailRoofSwiper2_next"></button>-->
                    <button @click="closeModal(roof2.id)" class="close">&times;</button>
                </div>
            </div>

        </div>
        <div id="confirm" class="confirm">
            <div>Ваш голос принят!</div>
            <button @click="openCommentForm()" class="btn btn-comment">Оставить пожелание</button>
        </div>
        <div id="comment">
            <textarea
            :value="input"
            class="form-control input"
            @input="onInputChange"
            placeholder="Ваш комментарий..."
            style="margin-bottom: 2vh; height: 35vh; font-size: 3vh"
            ></textarea>
            <SimpleKeyboard @onChange="onChange" @onKeyPress="onKeyPress" :input="input"/>
            <button class="btn btn-comment" v-on:click="saveComment(input)">Отправить</button>
            <button @click="closeComment()" class="close" style="top: 3vh; right: 6vh; position: absolute; color: #fff; font-size: 10vh; font-weight: normal; text-shadow: none;">&times;</button>
        </div>
        <div id="final">
            <div>Спасибо за пожелание!</div>
        </div>
    </div>
</template>

<script>
    import { Swiper, SwiperSlide } from 'vue-awesome-swiper'
    import 'swiper/css/swiper.css'
    import SimpleKeyboard from "./SimpleKeyboard";

    export default {
        data() {
            return {
                type1: {},
                type2: {},
                type3: {},
                roof1: {},
                roof2: {},
                input: '',
                swiperOptionsIndex1: {
                    slidesPerView: 1,
                    navigation: {
                        nextEl: '.IndexSwiper1_next',
                        prevEl: '.IndexSwiper1_prev'
                    },
                },
                swiperOptionsDetail1: {
                    slidesPerView: 1,
                    navigation: {
                        nextEl: '.DetailSwiper1_next',
                        prevEl: '.DetailSwiper1_prev'
                    },
                },
                swiperOptionsIndex2: {
                    slidesPerView: 1,
                    navigation: {
                        nextEl: '.IndexSwiper2_next',
                        prevEl: '.IndexSwiper2_prev'
                    },
                },
                swiperOptionsDetail2: {
                    slidesPerView: 1,
                    navigation: {
                        nextEl: '.DetailSwiper2_next',
                        prevEl: '.DetailSwiper2_prev'
                    },
                },
                swiperOptionsIndex3: {
                    slidesPerView: 1,
                    navigation: {
                        nextEl: '.IndexSwiper3_next',
                        prevEl: '.IndexSwiper3_prev'
                    },
                },
                swiperOptionsDetail3: {
                    slidesPerView: 1,
                    navigation: {
                        nextEl: '.DetailSwiper3_next',
                        prevEl: '.DetailSwiper3_prev'
                    },
                },
                swiperOptionsIndexRoof1: {
                    slidesPerView: 1,
                    allowTouchMove: false,
                    navigation: {
                        nextEl: '.IndexRoofSwiper1_next',
                        prevEl: '.IndexRoofSwiper1_prev'
                    },
                },
                swiperOptionsDetailRoof1: {
                    slidesPerView: 1,
                    allowTouchMove: false,
                    navigation: {
                        nextEl: '.DetailRoofSwiper1_next',
                        prevEl: '.DetailRoofSwiper1_prev'
                    },
                },
                swiperOptionsIndexRoof2: {
                    slidesPerView: 1,
                    allowTouchMove: false,
                    navigation: {
                        nextEl: '.IndexRoofSwiper2_next',
                        prevEl: '.IndexRoofSwiper2_prev'
                    },
                },
                swiperOptionsDetailRoof2: {
                    slidesPerView: 1,
                    allowTouchMove: false,
                    navigation: {
                        nextEl: '.DetailRoofSwiper2_next',
                        prevEl: '.DetailRoofSwiper2_prev'
                    },
                },
            }
        },
        created() {
            axios.get('/api/types').then(response => {
                this.type1 = response.data[0]
                this.type2 = response.data[1]
                this.type3 = response.data[2]
            });
            axios.get('/api/roofs').then(response => {
                this.roof1 = response.data[0]
                this.roof2 = response.data[1]
            });
        },
        methods: {
            Score(type) {
                //document.getElementById('wrapper').classList.add("blur");

                //document.getElementById('confirm').style.visibility = "visible";

                //document.querySelectorAll('.btn-score').forEach(function(button) {
                //    button.disabled = true;
                //});

                setTimeout(function(confirm){
                    //document.querySelectorAll('.btn-score').forEach(function(button) {
                    //    button.disabled = false;
                    //});
                    //document.getElementById('wrapper').classList.remove("blur");
                    //document.getElementById('confirm').style.visibility = "hidden";

                    document.getElementById('step1').style.visibility = "hidden";
                    document.getElementById('step2').style.visibility = "visible";

                    document.getElementById('h1').innerHTML = 'Уважаемые посетители шоурума, <br>\nпросим Вас выбрать наиболее понравившийся вариант отделки потолка'
                }, 10);

                axios
                .post(`/api/types`, {
                    id: type.id,
                    score: parseInt(type.score) + 1,
                })
                .then((response => {
                    axios.get('/api/types').then(response => {
                        this.type1 = response.data[0]
                        this.type2 = response.data[1]
                        this.type3 = response.data[2]
                    });
                }))
                .catch((error) => {
                });
            },
            ScoreRoof(roof) {
                document.getElementById('wrapper').classList.add("blur");

                document.getElementById('confirm').style.visibility = "visible";

                document.querySelectorAll('.btn-score').forEach(function(button) {
                    button.disabled = true;
                });

                setTimeout(function(confirm){
                    document.querySelectorAll('.btn-score').forEach(function(button) {
                        button.disabled = false;
                    });
                    document.getElementById('wrapper').classList.remove("blur");
                    document.getElementById('confirm').style.visibility = "hidden";

                    document.getElementById('step1').style.visibility = "visible";
                    document.getElementById('step2').style.visibility = "hidden";

                    document.getElementById('h1').innerHTML = 'Уважаемые посетители шоурума, <br>\nпросим Вас выбрать наиболее понравившийся вариант отделки квартиры'
                }, 5000);

                axios
                .post(`/api/roofs`, {
                    id: roof.id,
                    score: parseInt(roof.score) + 1,
                })
                .then((response => {
                    axios.get('/api/roofs').then(response => {
                        this.roof1 = response.data[0]
                        this.roof2 = response.data[1]
                    });
                }))
                .catch((error) => {
                });

                this.$refs.IndexSwiper1.$swiper.slideTo(0, false)
                this.$refs.IndexSwiper2.$swiper.slideTo(0, false)
                this.$refs.IndexSwiper3.$swiper.slideTo(0, false)
                this.$refs.IndexRoofSwiper1.$swiper.slideTo(0, false)
                this.$refs.IndexRoofSwiper2.$swiper.slideTo(0, false)
            },
            openModal(id, index) {
                document.getElementById('modal' + id).style.visibility = "visible"
                this.$refs.DetailSwiper1.$swiper.slideTo(index, false)
                this.$refs.DetailSwiper2.$swiper.slideTo(index, false)
                this.$refs.DetailSwiper3.$swiper.slideTo(index, false)
                this.$refs.DetailRoofSwiper1.$swiper.slideTo(index, false)
                this.$refs.DetailRoofSwiper2.$swiper.slideTo(index, false)
            },
            closeModal(id) {
                document.getElementById('modal' + id).style.visibility = "hidden"
            },
            openCommentForm() {
                document.getElementById('confirm').style.visibility = "hidden"
                document.getElementById('comment').style.visibility = "visible"
            },
            onChange(input) {
                this.input = input;
            },
            onKeyPress(button) {
                //console.log("button", button);
            },
            onInputChange(input) {
                this.input = input.target.value;
            },
            saveComment(input) {
                if(input && input.length > 0) {
                    axios
                    .post(`/api/comments`, {
                        comment: input
                    })
                    .then((response => {
                        this.input = ''
                        document.getElementById('comment').style.visibility = "hidden"
                        document.getElementById('final').style.visibility = "visible"

                        setTimeout(function(confirm){
                            document.getElementById('final').style.visibility = "hidden"
                        }, 3000);
                    }))
                    .catch((error) => {
                    });
                }
            },
            closeComment() {
                this.input = ''
                document.getElementById('comment').style.visibility = "hidden"
            },
        },
        mounted() {
            this._keyListener = function(e) {
                if (e.key === 'q' && (e.ctrlKey || e.metaKey)) {
                    e.preventDefault();
                    window.location.href = '/admin'
                }
            };
            document.addEventListener('keydown', this._keyListener.bind(this));
        },
        beforeMount() {
            //document.oncontextmenu = new Function("return false;");
        },
        components: {
            Swiper,
            SwiperSlide,
            SimpleKeyboard,
        },
    }
</script>