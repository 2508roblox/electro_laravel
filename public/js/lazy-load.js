// duyệt tất cả tấm ảnh cần lazy-load
const lazyImages = document.querySelectorAll('[lazy]');

// chờ các tấm ảnh này xuất hiện trên màn hình
const lazyImageObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
        // tấm ảnh này đã xuất hiện trên màn hình
        if (entry.isIntersecting) {
            const lazyImage = entry.target;
            const src = lazyImage.dataset.src;

            lazyImage.tagName.toLowerCase() === 'img'
                // <img>: copy data-src sang src
                ?
                lazyImage.src = src

                // <div>: copy data-src sang background-image
                :
                lazyImage.style.backgroundImage = "url(\'" + src + "\')";

            // copy xong rồi thì bỏ attribute lazy đi
            lazyImage.removeAttribute('lazy');

            // job done, không cần observe nó nữa
            observer.unobserve(lazyImage);
        }
    });
});

// Observe từng tấm ảnh và chờ nó xuất hiện trên màn hình
lazyImages.forEach((lazyImage) => {
    lazyImageObserver.observe(lazyImage);
});
