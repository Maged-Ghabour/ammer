const fs = require('fs');
const filePath = 'c:/Users/fkrtk/Desktop/Wordpress Websites/ammer-theme/assets/js/main.js';
let content = fs.readFileSync(filePath, 'utf8');

const targetContent = `        document.addEventListener('DOMContentLoaded', function () {
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
                    baAfter.style.backgroundImage = \`url(\${beforeSrc})\`;
                    beforeLayer.style.backgroundImage = \`url(\${afterSrc})\`;
                    
                    // Reset slider to middle
                    beforeLayer.style.width = '50%';
                    handle.style.left = '50%';
                });
            });`;

const replacementContent = `        document.addEventListener('DOMContentLoaded', function () {
            const containers = document.querySelectorAll('.ba-container');
            
            containers.forEach(container => {
                const beforeLayer = container.querySelector('.ba-before-layer') || container.querySelector('.ba-before');
                const handle = container.querySelector('.ba-handle');
                const thumbnails = container.parentElement ? container.parentElement.querySelectorAll('.thumbnail') : [];
                const baAfter = container.querySelector('.ba-after-layer') || container.querySelector('.ba-after');

                if (!beforeLayer || !handle) return;

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

                if (thumbnails.length > 0) {
                    thumbnails.forEach(thumb => {
                        thumb.addEventListener('click', function () {
                            thumbnails.forEach(t => t.classList.remove('active'));
                            this.classList.add('active');

                            const beforeSrc = this.getAttribute('data-before');
                            const afterSrc = this.getAttribute('data-after');
                            if(baAfter) baAfter.style.backgroundImage = \`url(\${beforeSrc})\`;
                            if(beforeLayer) beforeLayer.style.backgroundImage = \`url(\${afterSrc})\`;
                            
                            // Reset slider to middle
                            beforeLayer.style.width = '50%';
                            handle.style.left = '50%';
                        });
                    });
                }
            });`;

if (content.includes(targetContent)) {
    content = content.replace(targetContent, replacementContent);
    
    // Also fix GSAP animation for baContainer
    content = content.replace(
        "const baContainer = document.querySelector('.ba-container');\r\n            if(baContainer) {\r\n                gsap.fromTo(baContainer,",
        "const baContainers = document.querySelectorAll('.ba-container');\r\n            if(baContainers.length > 0) {\r\n                gsap.fromTo(baContainers,"
    );
    
    content = content.replace(
        "const baContainer = document.querySelector('.ba-container');\n            if(baContainer) {\n                gsap.fromTo(baContainer,",
        "const baContainers = document.querySelectorAll('.ba-container');\n            if(baContainers.length > 0) {\n                gsap.fromTo(baContainers,"
    );
    
    fs.writeFileSync(filePath, content);
    console.log("Replaced successfully.");
} else {
    console.log("Target content not found.");
}
