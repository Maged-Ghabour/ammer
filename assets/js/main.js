    
        document.addEventListener('DOMContentLoaded', function () {
            gsap.registerPlugin(ScrollTrigger);

            // 1. Hero Section Animation
            const heroTimeline = gsap.timeline();
            heroTimeline.fromTo('.hero-title-wrapper > *', 
                { y: 50, opacity: 0 }, 
                { y: 0, opacity: 1, duration: 1, stagger: 0.2, ease: 'power3.out' }
            )
            .fromTo('.hero-content > *', 
                { y: 30, opacity: 0 }, 
                { y: 0, opacity: 1, duration: 0.8, stagger: 0.15, ease: 'power3.out' },
                "-=0.6"
            )
            .fromTo('.hero-booking', 
                { x: -50, opacity: 0 }, 
                { x: 0, opacity: 1, duration: 0.8, ease: 'power3.out' },
                "-=0.6"
            )
            .fromTo('.hero-image img', 
                { clipPath: 'circle(0% at 50% 50%)', scale: 1.1 }, 
                { clipPath: 'circle(150% at 50% 50%)', scale: 1, duration: 1.8, ease: 'power3.inOut' },
                "-=1"
            );

            // Floating Background Blobs Animation
            gsap.to('.bg-blob', {
                y: '-=40',
                x: '+=30',
                rotation: 'random(-15, 15)',
                duration: 'random(4, 6)',
                yoyo: true,
                repeat: -1,
                ease: 'sine.inOut',
                stagger: 1.5
            });

            // Trust Image Reveal (Clip Path)
            const trustImage = document.querySelector('.trust-image img');
            if(trustImage) {
                gsap.fromTo(trustImage,
                    { clipPath: 'polygon(0 100%, 100% 100%, 100% 100%, 0 100%)', scale: 1.1 },
                    { 
                        clipPath: 'polygon(0 0, 100% 0, 100% 100%, 0 100%)', 
                        scale: 1,
                        duration: 1.5, 
                        ease: 'power3.inOut',
                        scrollTrigger: {
                            trigger: '.trust-section',
                            start: 'top 70%'
                        }
                    }
                );
            }

            // 2. Generic Fade-Up for Section Headers
            gsap.utils.toArray('.section-title, .section-subtitle').forEach(header => {
                gsap.fromTo(header,
                    { y: 30, opacity: 0 },
                    {
                        y: 0, opacity: 1, duration: 0.8, ease: 'power2.out',
                        scrollTrigger: {
                            trigger: header,
                            start: 'top 85%',
                        }
                    }
                );
            });

            // 3. Staggered Grid Animations (Services, Blog, Testimonials, FAQ)
            const grids = ['.services-grid', '.blog-grid', '.testimonials-grid', '.faq-grid'];
            grids.forEach(gridClass => {
                const grid = document.querySelector(gridClass);
                if(grid) {
                    gsap.fromTo(grid.children, 
                        { y: 50, opacity: 0 },
                        {
                            y: 0, opacity: 1, duration: 0.6, stagger: 0.15, ease: 'power2.out',
                            scrollTrigger: {
                                trigger: grid,
                                start: 'top 80%',
                            }
                        }
                    );
                }
            });

            // 4. Journey Steps Sequential Reveal
            const journeyGrid = document.querySelector('.journey-grid');
            if(journeyGrid) {
                const steps = gsap.utils.toArray('.step-item');
                gsap.fromTo(steps,
                    { x: 50, opacity: 0 },
                    {
                        x: 0, opacity: 1, duration: 0.8, stagger: 0.2, ease: 'back.out(1.2)',
                        scrollTrigger: {
                            trigger: journeyGrid,
                            start: 'top 75%',
                        }
                    }
                );
                gsap.fromTo('.journey-image img',
                    { scale: 0.9, opacity: 0 },
                    {
                        scale: 1, opacity: 1, duration: 1.5, ease: 'power2.out',
                        scrollTrigger: {
                            trigger: journeyGrid,
                            start: 'top 75%',
                        }
                    }
                );
            }

            // 5. Trust Stats Counters
            const trustStats = document.querySelector('.trust-stats');
            if(trustStats) {
                const numbers = document.querySelectorAll('.stat-number');
                numbers.forEach(num => {
                    // Save original text if not already saved
                    if(!num.dataset.val) {
                        num.dataset.val = num.innerText;
                    }
                    const text = num.dataset.val;
                    let targetVal = parseFloat(text.replace(/[^0-9.]/g, ''));
                    if(isNaN(targetVal)) return;
                    
                    const isDecimal = text.includes('.');
                    const suffix = text.replace(/[0-9.]/g, ''); // keep +, K, /5
                    
                    let obj = { val: 0 };
                    
                    gsap.to(obj, {
                        val: targetVal,
                        duration: 2.5,
                        ease: 'power3.out',
                        scrollTrigger: {
                            trigger: trustStats,
                            start: 'top 85%',
                        },
                        onUpdate: function() {
                            let currentVal = isDecimal ? obj.val.toFixed(1) : Math.floor(obj.val);
                            num.innerText = currentVal + suffix;
                        }
                    });
                });
            }

            // 6. Before/After Image Entrance
            const baContainer = document.querySelector('.ba-container');
            if(baContainer) {
                gsap.fromTo(baContainer,
                    { scale: 0.95, opacity: 0 },
                    {
                        scale: 1, opacity: 1, duration: 1, ease: 'power3.out',
                        scrollTrigger: {
                            trigger: '.before-after-section',
                            start: 'top 70%',
                        }
                    }
                );
            }
        });
    
    
        document.addEventListener('DOMContentLoaded', function () {
            const container = document.getElementById('ba-container');
            const beforeLayer = document.getElementById('ba-before-layer');
            const handle = document.getElementById('ba-handle');
            const thumbnails = document.querySelectorAll('.thumbnail');
            const baAfter = document.getElementById('ba-after-layer');

            if (!container) return;

            let isDragging = false;

            function updateSlider(e) {
                const rect = container.getBoundingClientRect();
                let clientX = e.type.includes('touch') ? e.touches[0].clientX : e.clientX;
                let x = clientX - rect.left;

                x = Math.max(0, Math.min(x, rect.width));
                const percent = (x / rect.width) * 100;

                beforeLayer.style.width = percent + '%';
                handle.style.left = percent + '%';
            }

            container.addEventListener('mousedown', (e) => {
                isDragging = true;
                updateSlider(e);
            });
            window.addEventListener('mouseup', () => isDragging = false);
            window.addEventListener('mousemove', (e) => {
                if (isDragging) updateSlider(e);
            });

            container.addEventListener('touchstart', (e) => {
                isDragging = true;
                updateSlider(e);
            });
            window.addEventListener('touchend', () => isDragging = false);
            window.addEventListener('touchmove', (e) => {
                if (isDragging) updateSlider(e);
            });

            thumbnails.forEach(thumb => {
                thumb.addEventListener('click', function () {
                    thumbnails.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');

                    const beforeSrc = this.getAttribute('data-before');
                    const afterSrc = this.getAttribute('data-after');
                    baAfter.style.backgroundImage = `url(${beforeSrc})`;
                    beforeLayer.style.backgroundImage = `url(${afterSrc})`;
                    
                    // Reset slider to middle
                    beforeLayer.style.width = '50%';
                    handle.style.left = '50%';
                });
            });

                        // Journey Steps Logic
            const journeySteps = document.querySelectorAll('.journey-steps .step-item');
            journeySteps.forEach(step => {
                step.addEventListener('click', () => {
                    journeySteps.forEach(s => s.classList.remove('active'));
                    step.classList.add('active');
                });
            });

                        // Testimonials Slider Logic
            const testimonialsList = document.querySelector('.testimonials-list');
            const controlBtns = document.querySelectorAll('.testimonials-controls .control-btn');
            if (testimonialsList && controlBtns.length >= 2) {
                const btnDown = controlBtns[0];
                const btnUp = controlBtns[1];
                
                btnDown.addEventListener('click', () => {
                    testimonialsList.scrollBy({ top: 220, behavior: 'smooth' });
                });
                
                btnUp.addEventListener('click', () => {
                    testimonialsList.scrollBy({ top: -220, behavior: 'smooth' });
                });
            }

                                    

            // Mobile Menu Logic
            const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
            const closeMenuBtn = document.querySelector('.close-menu-btn');
            const mainNav = document.querySelector('.main-nav');
            const mobileOverlay = document.querySelector('.mobile-menu-overlay');

            if (mobileMenuBtn && mainNav) {
                function openMenu() {
                    mainNav.classList.add('open');
                    if(mobileOverlay) mobileOverlay.classList.add('open');
                    document.body.style.overflow = 'hidden';
                }
                function closeMenu() {
                    mainNav.classList.remove('open');
                    if(mobileOverlay) mobileOverlay.classList.remove('open');
                    document.body.style.overflow = '';
                }
                mobileMenuBtn.addEventListener('click', openMenu);
                if(closeMenuBtn) closeMenuBtn.addEventListener('click', closeMenu);
                if(mobileOverlay) mobileOverlay.addEventListener('click', closeMenu);
            }

            // FAQ Accordion Logic
            const faqItems = document.querySelectorAll('.faq-item');
            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question');
                question.addEventListener('click', () => {
                    const isActive = item.classList.contains('active');
                    faqItems.forEach(faq => faq.classList.remove('active'));
                    if (!isActive) {
                        item.classList.add('active');
                    }
                });
            });
        });
    
















