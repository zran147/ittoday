        let slideIndex = 1;
        let slideIndex2 = 1;
        showSlides(slideIndex);
        showSlides2(slideIndex2);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function plusSlides2(n) {
            showSlides2(slideIndex2 += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function currentSlide2(n) {
            showSlides2(slideIndex2 = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}    
            if (n < 1) {slideIndex = slides.length}

            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }

            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active1", "");
            }

            slides[slideIndex-1].style.display = "block";  
            dots[slideIndex-1].className += " active1";
        }

        function showSlides2(n) {
            let i;
            let slides2 = document.getElementsByClassName("mySlides2");
            let dots2 = document.getElementsByClassName("dot2");
            if (n > slides2.length) {slideIndex2 = 1}    
            if (n < 1) {slideIndex2 = slides2.length}

            for (i = 0; i < slides2.length; i++) {
                slides2[i].style.display = "none";  
            }

            for (i = 0; i < dots2.length; i++) {
                dots2[i].className = dots2[i].className.replace(" active2", "");
            }

            slides2[slideIndex2-1].style.display = "block";  
            dots2[slideIndex2-1].className += " active2";
        }