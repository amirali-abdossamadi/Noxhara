document.addEventListener('DOMContentLoaded', function() {
    console.log('Noxhara theme loaded');

    // Galactic background animation
    const canvas = document.getElementById('galaxy-canvas');
    if (canvas && canvas.getContext) {
        const ctx = canvas.getContext('2d');
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        window.addEventListener('resize', () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        });

        class Star {
            constructor() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.size = Math.random() * 2 + 0.5;
                this.speedX = (Math.random() - 0.5) * 0.2;
                this.speedY = (Math.random() - 0.5) * 0.2;
                this.opacity = Math.random() * 0.5 + 0.3;
            }

            update() {
                this.x += this.speedX;
                this.y += this.speedY;
                if (this.x < 0) this.x = canvas.width;
                if (this.x > canvas.width) this.x = 0;
                if (this.y < 0) this.y = canvas.height;
                if (this.y > canvas.height) this.y = 0;
            }

            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fillStyle = `rgba(255, 255, 255, ${this.opacity})`;
                ctx.fill();
            }
        }

        const stars = [];
        for (let i = 0; i < 200; i++) {
            stars.push(new Star());
        }

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            stars.forEach(star => {
                star.update();
                star.draw();
            });
            requestAnimationFrame(animate);
        }

        animate();
    } else {
        console.error('Canvas not supported or element not found');
    }

    // Header scroll and admin bar handling
    const header = document.getElementById('main-header');
    if (header) {
        const adminBar = document.getElementById('wpadminbar');
        let lastScrollTop = 0;

        // Adjust header top offset for admin bar
        function adjustHeaderOffset() {
            if (adminBar) {
                const adminBarHeight = adminBar.offsetHeight;
                header.style.top = `${adminBarHeight}px`;
            } else {
                header.style.top = '0';
            }
        }

        adjustHeaderOffset();
        window.addEventListener('resize', adjustHeaderOffset);

        // Scroll animation
        window.addEventListener('scroll', () => {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollTop > lastScrollTop && scrollTop > 50) {
                header.classList.add('scrolled');
            } else if (scrollTop <= 50) {
                header.classList.remove('scrolled');
            }
            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
        });
    } else {
        console.error('Header element not found');
    }
});