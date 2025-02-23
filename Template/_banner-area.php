<!-- Banner Area -->
<section id="banner-area">
    <div class="slider">
        <div class="item">
            <img src="./assets/slide_1.webp" alt="Banner1">
        </div>
        <div class="item">
            <img src="./assets/slide_2.webp" alt="Banner2">
        </div>
        <div class="item">
            <img src="./assets/slide_3.webp" alt="Banner3">
        </div>
    </div>
    <div class="dots">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
</section>
<!-- !Banner Area -->

<style>
    #banner-area {
        width: 100%;
        position: relative;
        overflow: hidden;
    }

    .slider {
        width: 300%;
        height: 600px;
        display: flex;
        animation: slideshow 20s infinite;
    }

    .slider .item {
        width: 33.33%;
    }

    .slider .item img {
        height: 600px;
        object-fit: cover;
    }

    .dots {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 10px;
    }

    .dot {
        width: 12px;
        height: 12px;
        background: rgba(255, 255, 255, 0.5);
        border-radius: 50%;
        cursor: pointer;
    }

    .dot:hover {
        background: rgba(255, 255, 255, 0.8);
    }

    @keyframes slideshow {
        0% { transform: translateX(0); }
        33.33% { transform: translateX(-33.33%); }
        66.66% { transform: translateX(-66.66%); }
        100% { transform: translateX(0); }
    }

    /* Thêm class active cho dot */
    .dot.active {
        background: rgba(255, 255, 255, 1);
    }
</style>

<script>
    $(document).ready(function(){
        const slider = $('.slider');
        const dots = $('.dot');
        let currentSlide = 0;
        let slideInterval;

        // Dừng animation mặc định
        slider.css('animation', 'none');

        // Hàm chuyển slide
        function goToSlide(index) {
            currentSlide = index;
            slider.css('transform', `translateX(-${33.33 * index}%)`);
            dots.removeClass('active');
            dots.eq(index).addClass('active');
        }

        // Hàm tự động chuyển slide
        function startSlideShow() {
            slideInterval = setInterval(() => {
                currentSlide = (currentSlide + 1) % 3;
                goToSlide(currentSlide);
            }, 5000);
        }

        // Xử lý click dot
        dots.click(function() {
            clearInterval(slideInterval);
            const index = $(this).index();
            goToSlide(index);
            startSlideShow();
        });

        // Kích hoạt dot đầu tiên và bắt đầu slideshow
        goToSlide(0);
        startSlideShow();
    });
</script>