<template>
    <div class="container-fluid">
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
                    <h1>
                        Уважаемые посетители шоурума,
                        <br>просим Вас выбрать наиболее понравившийся вариант отделки квартиры
                    </h1>
                </div>
            </div>
        </div>
        <div class="row">
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

        </div>
    </div>
</template>

<script>
    import { Swiper, SwiperSlide } from 'vue-awesome-swiper'
    import 'swiper/css/swiper.css'

    export default {
        data() {
            return {
                type1: {},
                type2: {},
                type3: {},
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
            }
        },
        created() {
            axios.get('/api/types').then(response => {
                this.type1 = response.data[0]
                this.type2 = response.data[1]
                this.type3 = response.data[2]
            });
        },
        methods: {
            Score(type) {
                document.querySelectorAll('.btn-score').forEach(function(button) {
                    button.disabled = true;
                });

                setTimeout(function(){
                    document.querySelectorAll('.btn-score').forEach(function(button) {
                        button.disabled = false;
                    });
                }, 30000);

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
            openModal(id, index) {
                document.getElementById('modal' + id).style.visibility = "visible"
                this.$refs.DetailSwiper1.$swiper.slideTo(index, false)
                this.$refs.DetailSwiper2.$swiper.slideTo(index, false)
                this.$refs.DetailSwiper3.$swiper.slideTo(index, false)
            },
            closeModal(id) {
                document.getElementById('modal' + id).style.visibility = "hidden"
            },
        },
        mounted() {
            this._keyListener = function(e) {
                if (e.key === 'q' && (e.ctrlKey || e.metaKey)) {
                    e.preventDefault();
                    window.location.href = '/types'
                }
            };
            document.addEventListener('keydown', this._keyListener.bind(this));
        },
        beforeMount() {
            document.oncontextmenu = new Function("return false;");
        },
        components: {
            Swiper,
            SwiperSlide,
        },
    }
</script>