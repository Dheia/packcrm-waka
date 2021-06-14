import Swiper from 'swiper';
// import Swiper styles
import 'swiper/swiper-bundle.css';

window.instanciateSwiper = function ($options) {
    //console.log($options)
    return {
        swiper: null,
        options: $options,
        initSwiper($refs_container) {
            this.swiper = new Swiper($refs_container, {
                loop: this.options.loop == '1',
                slidesPerView: this.options.slidesPerView,
                spaceBetween: 0,
                breakpoints: {
                    640: {
                        slidesPerView: this.options.slidesPerView_640,
                        spaceBetween: 0,
                    },
                    1024: {
                        slidesPerView: this.options.slidesPerView_1024,
                        spaceBetween: 0,
                    },
                },
            })
        }
    }
}
window.instanciateDemoSwiper1 = function () {
    console.log('instanciateDemoSwiper1')
    return {
        swiper1: null,
        initSwiper1() {
            this.swiper1 = new Swiper('.s1', {
                loop: false,
                slidesPerView: 1,
                spaceBetween: 0,
                observer: true,
                observeParents: true,
            })
            this.swiper1.update()
        }
    }
}

window.instanciateDemoSwiper2 = function () {
    console.log('instanciateDemoSwiper2')
    return {
        swiper2: null,
        initSwiper2() {
            this.swiper2 = new Swiper('.s2', {
                loop: false,
                slidesPerView: 1,
                spaceBetween: 0,
                observer: true,
                observeParents: true,
            })
            this.swiper2.update()
        }
    }
}
window.instanciateDemoSwiper3 = function () {
    console.log('instanciateDemoSwiper3')
    return {
        swiper3: null,
        initSwiper3($refs_container) {
            this.swiper3 = new Swiper($refs_container, {
                loop: false,
                slidesPerView: 1,
                spaceBetween: 0,
                observer: true,
                observeParents: true,
            })
            this.swiper3.update()
        }
    }
}


