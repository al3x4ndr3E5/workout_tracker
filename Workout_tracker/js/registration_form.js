// Smooth scrolling effect
const smoothScroll = (target) => {
    const element = document.querySelector(target);
    window.scrollTo({
      top: element.offsetTop,
      behavior: 'smooth'
    });
  };
  
  // Add event listener to smooth scroll when clicking navigation links
  const navLinks = document.querySelectorAll('.navbar a');
  navLinks.forEach((link) => {
    link.addEventListener('click', (event) => {
      event.preventDefault();
      const target = event.target.getAttribute('href');
      smoothScroll(target);
    });
  });
  
  // Show/hide navigation bar on scroll
  let prevScrollPos = window.pageYOffset;
  window.addEventListener('scroll', () => {
    const currentScrollPos = window.pageYOffset;
    const navbar = document.querySelector('.navbar');
    if (prevScrollPos > currentScrollPos) {
      navbar.style.top = '0';
    } else {
      navbar.style.top = '-100px';
    }
    prevScrollPos = currentScrollPos;
  });
  
  // Toggle mobile menu
  const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
  const mobileMenu = document.querySelector('.mobile-menu');
  mobileMenuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('active');
  });
  
  // Add parallax effect to hero section
  const heroSection = document.querySelector('.hero-section');
  window.addEventListener('scroll', () => {
    const scrollPosition = window.pageYOffset;
    heroSection.style.backgroundPositionY = `${scrollPosition * 0.7}px`;
  });
  
  // Trigger animations on scroll using Intersection Observer API
  const sections = document.querySelectorAll('.section');
  const observerOptions = {
    root: null,
    rootMargin: '0px',
    threshold: 0.3
  };
  
  const sectionObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('animate');
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);
  
  sections.forEach((section) => {
    sectionObserver.observe(section);
  });
  
  // Image slider for testimonials
  const testimonials = document.querySelectorAll('.testimonial');
  const prevBtn = document.querySelector('.prev-btn');
  const nextBtn = document.querySelector('.next-btn');
  let currentIndex = 0;
  
  const showTestimonial = (index) => {
    testimonials.forEach((testimonial, i) => {
      testimonial.style.display = i === index ? 'block' : 'none';
    });
  };
  
  const navigateTestimonials = (direction) => {
    currentIndex += direction;
    if (currentIndex < 0) {
      currentIndex = testimonials.length - 1;
    } else if (currentIndex >= testimonials.length) {
      currentIndex = 0;
    }
    showTestimonial(currentIndex);
  };
  
  prevBtn.addEventListener('click', () => {
    navigateTestimonials(-1);
  });
  
  nextBtn.addEventListener('click', () => {
    navigateTestimonials(1);
  });
  
  showTestimonial(currentIndex);
  
  // Form validation for registration
  const registrationForm = document.querySelector('#registration-form');
  const usernameInput = document.querySelector('#username');
  const passwordInput = document.querySelector('#password');
  const confirmPasswordInput = document.querySelector('#confirm_password');
  
  registrationForm.addEventListener('submit', (event) => {
    event.preventDefault();
    
    if (passwordInput.value !== confirmPasswordInput.value) {
      // Display error message for password mismatch
      const errorContainer = document.querySelector('.error-container');
      errorContainer.textContent = 'Passwords do not match.';
      return;
    }
    
    // Submit the form if validation passes
    registrationForm.submit();
  });
  