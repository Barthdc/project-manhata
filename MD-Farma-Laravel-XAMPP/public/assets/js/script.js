const navToggle = document.querySelector('[data-nav-toggle]');
const navMenu = document.querySelector('[data-nav-menu]');

if (navToggle && navMenu) {
  navToggle.addEventListener('click', () => {
    navMenu.classList.toggle('is-open');
  });

  navMenu.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => navMenu.classList.remove('is-open'));
  });
}

const accordion = document.querySelector('[data-accordion]');
if (accordion) {
  const buttons = accordion.querySelectorAll('.accordion__item');
  buttons.forEach((button) => {
    button.addEventListener('click', () => {
      const panel = button.nextElementSibling;
      const icon = button.querySelector('i');
      const isOpen = button.classList.contains('is-open');

      buttons.forEach((item) => {
        item.classList.remove('is-open');
        item.querySelector('i').textContent = '+';
        if (item.nextElementSibling) item.nextElementSibling.classList.remove('is-open');
      });

      if (!isOpen) {
        button.classList.add('is-open');
        icon.textContent = '−';
        if (panel) panel.classList.add('is-open');
      }
    });
  });
}

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) entry.target.classList.add('is-visible');
  });
}, { threshold: 0.12 });

document.querySelectorAll('.reveal').forEach((element) => observer.observe(element));

const appointmentForm = document.querySelector('.appointment-form');
if (appointmentForm) {
  appointmentForm.addEventListener('submit', (event) => {
    event.preventDefault();
    alert('Appointment berhasil disiapkan. Silakan hubungi admin untuk integrasi backend.');
  });
}
