document.addEventListener("DOMContentLoaded", () => {

    const navbar = document.querySelector(".navbar");
    if (navbar) {
        window.addEventListener("scroll", () => {
            if (window.scrollY > 50) {
                navbar.classList.add("navbar-scrolled");
            } else {
                navbar.classList.remove("navbar-scrolled");
            }
        });
    }


    const bookingForm = document.querySelector("form");
    if (bookingForm && window.location.pathname.includes("booking.html")) {

        const confirmBtn = bookingForm.querySelector("button[type='submit']");

        bookingForm.addEventListener("submit", (e) => {
            e.preventDefault();


            const inputs = bookingForm.querySelectorAll("input[type='text'], input[type='email'], input[type='tel']");
            let isValid = true;
            inputs.forEach(input => {

                if (input.value.trim() === "" && !input.placeholder.includes("Home town") && !input.placeholder.includes("District")) {
                    isValid = false;
                    input.style.borderColor = "#ff4d4d";
                } else {
                    input.style.borderColor = "";
                }
            });

            if (isValid) {
                if (confirmBtn) {
                    const originalText = confirmBtn.innerText;
                    confirmBtn.innerText = "Processing...";
                    setTimeout(() => {
                        alert("Thank you for your booking request! We will contact you shortly.");
                        bookingForm.reset();
                        confirmBtn.innerText = originalText;
                    }, 800);
                } else {
                    alert("Thank you for your booking request! We will contact you shortly.");
                    bookingForm.reset();
                }
            } else {
                alert("Please fill in all necessary fields.");
            }
        });
    }

    // 3. Gallery Lightbox (gallery.html)
    const galleryItems = document.querySelectorAll(".gallery-img");
    if (galleryItems.length > 0) {
        galleryItems.forEach(item => {
            item.addEventListener("click", () => {

                const overlay = document.createElement("div");
                overlay.className = "gallery-lightbox-overlay";
                Object.assign(overlay.style, {
                    position: "fixed", top: "0", left: "0", width: "100%", height: "100%",
                    backgroundColor: "rgba(0,0,0,0.9)", zIndex: "9999",
                    display: "flex", justifyContent: "center", alignItems: "center", cursor: "pointer",
                    opacity: "0", transition: "opacity 0.3s ease"
                });

                const img = document.createElement("img");
                img.src = item.src;
                Object.assign(img.style, {
                    maxWidth: "90%", maxHeight: "90%", borderRadius: "8px",
                    boxShadow: "0 5px 25px rgba(212,175,55,0.3)",
                    transform: "scale(0.8)", transition: "transform 0.3s ease"
                });

                overlay.appendChild(img);
                document.body.appendChild(overlay);


                setTimeout(() => {
                    overlay.style.opacity = "1";
                    img.style.transform = "scale(1)";
                }, 10);


                overlay.addEventListener("click", () => {
                    overlay.style.opacity = "0";
                    img.style.transform = "scale(0.8)";
                    setTimeout(() => overlay.remove(), 300);
                });
            });
        });
    }


    const loadMoreBtn = document.querySelector(".btn-outline-custom");
    if (loadMoreBtn && loadMoreBtn.innerText.includes("Load More")) {
        loadMoreBtn.addEventListener("click", () => {
            const originalText = loadMoreBtn.innerText;
            loadMoreBtn.innerText = "Loading...";
            setTimeout(() => {
                alert("No more images to load at the moment!");
                loadMoreBtn.innerText = originalText;
            }, 1000);
        });
    }
});
