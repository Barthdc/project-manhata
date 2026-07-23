<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MediApotek — Health & Pharmacy Landing Page</title>
  <meta name="description" content="Landing page apotek dan layanan kesehatan modern, responsive untuk desktop dan mobile." />
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" />
</head>
<body>
  <div class="site-shell">
    <header class="header" id="top">
      <div class="topbar">
        <div class="topbar__left">
          <span>☎ Phone: +62 812-3456-7890</span>
          <span>✉ Email: info@mediapotek.com</span>
          <span>📍 Jl. Kesehatan No. 21, Indonesia</span>
        </div>
        <div class="topbar__right">
          <span>🇮🇩 Indonesia</span>
          <span class="divider"></span>
          <span>Follow Us:</span>
          <a href="#" aria-label="Facebook">f</a>
          <a href="#" aria-label="Twitter">x</a>
          <a href="#" aria-label="Instagram">ig</a>
          <a href="#" aria-label="Youtube">yt</a>
        </div>
      </div>

      <nav class="navbar">
        <a href="#top" class="brand" aria-label="MediApotek Home">
          <span class="brand__mark"></span>
          <span>
            <strong>MediApotek</strong>
            <small>Health & Pharmacy</small>
          </span>
        </a>

        <button class="nav-toggle" type="button" aria-label="Buka menu" data-nav-toggle>
          <span></span><span></span><span></span>
        </button>

        <ul class="nav-menu" data-nav-menu>
          <li><a href="#top" class="active">Home +</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Services +</a></li>
          <li><a href="#process">Pages +</a></li>
          <li><a href="#blog">Blog +</a></li>
          <li><a href="#contact">Contact Us</a></li>
        </ul>

        <div class="nav-actions">
          <button class="icon-btn" aria-label="Cari">⌕</button>
          <button class="icon-btn cart" aria-label="Keranjang">🛒<span>0</span></button>
          <a class="btn btn--green" href="<?php echo e(route('chat.index')); ?>">Konsultasi Online</a>
        </div>
      </nav>
    </header>

    <main>
      <section class="hero section-pad">
        <div class="decor decor--dots"></div>
        <div class="decor decor--plus decor--plus-1">✚</div>
        <div class="decor decor--plus decor--plus-2">✚</div>
        <div class="decor decor--plus decor--plus-3">✚</div>
        <div class="hero__content">
          <span class="eyebrow"><i></i> 24/7 Emergency Pharmacy Service</span>
          <h1>Caring for <span>Health</span><br />Caring for You</h1>
          <p>Layanan apotek modern untuk konsultasi obat, resep dokter, vitamin, alat kesehatan, dan pengantaran obat yang cepat serta terpercaya.</p>
          <div class="hero__buttons">
            <a href="#about" class="btn btn--green">Discover More</a>
            <a href="<?php echo e(route('filament.admin.auth.login')); ?>" class="btn btn--blue">Login</a>
          </div>
        </div>
        <div class="hero__visual" aria-hidden="true">
          <img src="<?php echo e(asset('assets/img/hero-pharmacist.svg')); ?>" alt="Ilustrasi apoteker profesional" />
        </div>
      </section>

      <section class="about section-pad" id="about">
        <div class="about__visual reveal">
          <img src="<?php echo e(asset('assets/img/about-pharmacy.svg')); ?>" alt="Ilustrasi layanan apotek" />
          <div class="doctor-card">
            <strong>Apt. Sinta Pratiwi</strong>
            <span>Konsultan Obat</span>
            <div>★★★★★</div>
            <small>+62 812 7896</small>
          </div>
        </div>
        <div class="about__content reveal">
          <span class="eyebrow"><i></i> About Us Company</span>
          <h2>Affordable Health Care Solutions</h2>
          <p>MediApotek membantu pelanggan mendapatkan obat, produk kesehatan, dan konsultasi farmasi dengan proses yang rapi, aman, dan mudah digunakan.</p>
          <div class="feature-grid">
            <span>💚 Apoteker Profesional</span>
            <span>💚 Fasilitas Lengkap</span>
            <span>💚 Pesan Obat Cepat</span>
            <span>💚 Konsultasi Medis</span>
            <span>💚 Layanan Resep</span>
            <span>💚 Produk Terpercaya</span>
          </div>
          <a href="#services" class="btn btn--green">More About Us</a>
        </div>
      </section>

      <section class="services section-pad" id="services">
        <div class="section-heading reveal">
          <span class="eyebrow"><i></i> Our Services</span>
          <h2>Our MediApotek Specialties<br />Technical Service</h2>
        </div>
        <div class="services__grid">
          <article class="service-card reveal">
            <div class="service-card__icon">💊</div>
            <h3>Resep Dokter</h3>
            <p>30+ produk resep</p>
            <a href="#appointment">Read More</a>
          </article>
          <article class="service-card service-card--active reveal">
            <div class="service-card__icon">🦷</div>
            <h3>Dental Care</h3>
            <p>20+ produk perawatan</p>
            <a href="#appointment">Read More</a>
          </article>
          <article class="service-card reveal">
            <div class="service-card__icon">🩺</div>
            <h3>Konsultasi Obat</h3>
            <p>30+ apoteker</p>
            <a href="#appointment">Read More</a>
          </article>
          <article class="service-card reveal">
            <div class="service-card__icon">🧠</div>
            <h3>Vitamin & Suplemen</h3>
            <p>30+ pilihan produk</p>
            <a href="#appointment">Read More</a>
          </article>
          <article class="service-card reveal">
            <div class="service-card__icon">🧴</div>
            <h3>Skincare Health</h3>
            <p>30+ produk aman</p>
            <a href="#appointment">Read More</a>
          </article>
          <article class="service-card reveal">
            <div class="service-card__icon">👁️</div>
            <h3>Eye Care</h3>
            <p>30+ produk mata</p>
            <a href="#appointment">Read More</a>
          </article>
          <article class="service-card reveal">
            <div class="service-card__icon">🦴</div>
            <h3>Alat Kesehatan</h3>
            <p>30+ alat tersedia</p>
            <a href="#appointment">Read More</a>
          </article>
          <article class="service-card reveal">
            <div class="service-card__icon">❤️</div>
            <h3>Heart Care</h3>
            <p>30+ produk jantung</p>
            <a href="#appointment">Read More</a>
          </article>
        </div>
        <div class="services__more reveal">You Get Our 20+ More services... <a href="#appointment">Explore All Services</a></div>
      </section>

      <section class="cta section-pad">
        <div class="cta__panel reveal">
          <div>
            <h2>We’re Welcoming New Patients<br />And Can’t Wait To Meet You!</h2>
            <p>Konsultasi dengan tim profesional kami untuk memilih obat dan produk kesehatan yang tepat.</p>
            <div class="cta__actions">
              <a href="#appointment" class="btn btn--green">Book Appointment</a>
              <a href="#contact" class="btn btn--outline">Get Free Consulting</a>
            </div>
          </div>
          <img src="<?php echo e(asset('assets/img/cta-team.svg')); ?>" alt="Tim layanan kesehatan" />
        </div>
      </section>

      <section class="why section-pad">
        <div class="why__content reveal">
          <span class="eyebrow"><i></i> Why Choose Us</span>
          <h2>We Are Always Open For<br />Your Health Services</h2>
          <div class="timeline">
            <div>
              <b>01</b>
              <strong>Compassionate & Expert Care</strong>
              <p>Tim apotek membantu pelanggan dengan pengalaman, empati, dan penjelasan yang mudah dipahami.</p>
            </div>
            <div>
              <b>02</b>
              <strong>Patient-Centered Approach</strong>
              <p>Setiap saran disesuaikan dengan kebutuhan kesehatan, riwayat obat, dan keamanan pemakaian.</p>
            </div>
            <div>
              <b>03</b>
              <strong>Personalized Treatment Plans</strong>
              <p>Kami membantu mengatur penggunaan obat agar lebih aman, terjadwal, dan efektif.</p>
            </div>
          </div>
        </div>
        <div class="why__visual reveal">
          <img src="<?php echo e(asset('assets/img/video-care.svg')); ?>" alt="Layanan konsultasi farmasi" />
        </div>
      </section>

      <section class="stats reveal">
        <div><strong>9k+</strong><span>Pelanggan Puas</span></div>
        <div><strong>136+</strong><span>Produk Tersedia</span></div>
        <div><strong>10k+</strong><span>Transaksi Berhasil</span></div>
        <div><strong>60+</strong><span>Mitra Kesehatan</span></div>
      </section>

      <section class="doctors section-pad">
        <div class="section-heading reveal">
          <span class="eyebrow"><i></i> Expert Doctors</span>
          <h2>Meet Our Professional Doctors</h2>
        </div>
        <div class="doctor-grid">
          <article class="team-card reveal"><div class="avatar avatar--one"></div><h3>Dr. Malcolm Function</h3><span>Neurologist</span></article>
          <article class="team-card reveal"><div class="avatar avatar--two"></div><h3>Dr. Douglas Lyphe</h3><span>Physiotherapist</span></article>
          <article class="team-card reveal"><div class="avatar avatar--three"></div><h3>Dr. Wisteria Ravenc</h3><span>Cardiologist</span></article>
          <article class="team-card reveal"><div class="avatar avatar--four"></div><h3>Apt. Benjamin Evalent</h3><span>Pharmacist</span></article>
        </div>
      </section>

      <section class="appointment section-pad" id="appointment">
        <div class="hours reveal">
          <h3>Working Hours</h3>
          <p>Pelayanan tersedia untuk kebutuhan obat harian dan konsultasi.</p>
          <div><span>Monday - Tuesday:</span><b>9am - 6pm</b></div>
          <div><span>Wednesday - Thursday:</span><b>8am - 5pm</b></div>
          <div><span>Friday:</span><b>7am - 10pm</b></div>
          <div><span>Saturday:</span><b>10am - 7pm</b></div>
          <div><span>Sunday:</span><b>Closed</b></div>
        </div>
        <form class="appointment-form reveal">
          <h2>Make An Appointment</h2>
          <label><input type="text" placeholder="Your Name" /></label>
          <label><input type="email" placeholder="Your Email" /></label>
          <label><input type="tel" placeholder="Phone Number" /></label>
          <label><select><option>Choose Department</option><option>Konsultasi Obat</option><option>Resep Dokter</option><option>Alat Kesehatan</option></select></label>
          <div class="form-row">
            <label><input type="date" /></label>
            <label><input type="time" /></label>
          </div>
          <button class="btn btn--green" type="submit">Book An Appointment</button>
        </form>
      </section>

      <section class="process section-pad" id="process">
        <div class="section-heading reveal">
          <span class="eyebrow"><i></i> Work Process</span>
          <h2>Let’s See How We Work Process</h2>
        </div>
        <div class="process__row">
          <article class="process-card reveal"><b>01</b><div>📋</div><h3>Patient Registration</h3><p>Pelanggan memilih layanan atau mengisi data kebutuhan obat.</p></article>
          <article class="process-card reveal"><b>02</b><div>🩺</div><h3>Check-Ups</h3><p>Tim memeriksa keluhan, resep, dan kecocokan produk.</p></article>
          <article class="process-card reveal"><b>03</b><div>💬</div><h3>Get Report</h3><p>Pelanggan menerima rekomendasi pemakaian obat.</p></article>
          <article class="process-card reveal"><b>04</b><div>💚</div><h3>Ongoing Care</h3><p>Layanan lanjutan untuk kebutuhan kesehatan rutin.</p></article>
        </div>
      </section>

      <section class="faq section-pad">
        <div class="faq__content reveal">
          <span class="eyebrow"><i></i> FAQs</span>
          <h2>Frequently Asked Have<br />Any Question?</h2>
          <div class="accordion" data-accordion>
            <button class="accordion__item is-open" type="button"><span>01. Layanan apa saja yang tersedia?</span><i>−</i></button>
            <p class="accordion__panel is-open">Kami menyediakan obat resep, produk kesehatan, konsultasi farmasi, vitamin, alat kesehatan, dan layanan pemesanan obat.</p>
            <button class="accordion__item" type="button"><span>02. Bagaimana cara membuat appointment?</span><i>+</i></button>
            <p class="accordion__panel">Isi form appointment, pilih jadwal, lalu tim kami akan menghubungi Anda.</p>
            <button class="accordion__item" type="button"><span>03. Apakah bisa konsultasi online?</span><i>+</i></button>
            <p class="accordion__panel">Bisa, pelanggan dapat melakukan konsultasi dasar melalui kontak yang tersedia.</p>
          </div>
        </div>
        <div class="faq__visual reveal"><img src="<?php echo e(asset('assets/img/faq-pharmacist.svg')); ?>" alt="FAQ apotek" /></div>
      </section>

      <section class="testimonials section-pad">
        <div class="section-heading reveal">
          <span class="eyebrow"><i></i> Testimonials</span>
          <h2>What Our Present Says?</h2>
        </div>
        <div class="testimonial-row">
          <article class="testimonial reveal"><div>★★★★★</div><p>“Pelayanan cepat, penjelasan obat jelas, dan staff sangat ramah.”</p><strong>Pelican Steve</strong><span>Customer</span></article>
          <article class="testimonial reveal"><div>★★★★★</div><p>“Konsultasi membantu saya memilih vitamin yang sesuai kebutuhan.”</p><strong>Nadia Putri</strong><span>Customer</span></article>
        </div>
      </section>

      <section class="blog section-pad" id="blog">
        <div class="blog__heading reveal">
          <div>
            <span class="eyebrow"><i></i> Our Blogs</span>
            <h2>Our Latest News & Blogs</h2>
          </div>
          <a href="#" class="btn btn--green">View All Posts</a>
        </div>
        <div class="blog-grid">
          <article class="blog-card reveal"><img src="<?php echo e(asset('assets/img/blog-1.svg')); ?>" alt="Artikel kesehatan" /><div><span>👤 By Jonson &nbsp; 📅 08 Nov, 2026</span><h3>How Business Is Taking Over & What to Do About It</h3><a href="#">Read More</a></div></article>
          <article class="blog-card reveal"><img src="<?php echo e(asset('assets/img/blog-2.svg')); ?>" alt="Artikel apotek" /><div><span>👤 By Jonson &nbsp; 📅 08 Nov, 2026</span><h3>Tips Memilih Obat dengan Aman untuk Keluarga</h3><a href="#">Read More</a></div></article>
          <article class="blog-card reveal"><img src="<?php echo e(asset('assets/img/blog-3.svg')); ?>" alt="Artikel konsultasi" /><div><span>👤 By Jonson &nbsp; 📅 08 Nov, 2026</span><h3>Kapan Harus Konsultasi dengan Apoteker?</h3><a href="#">Read More</a></div></article>
        </div>
      </section>
    </main>

    <footer class="footer" id="contact">
      <div class="newsletter reveal">
        <h2>Subscribe For Newsletter</h2>
        <form>
          <input type="email" placeholder="Enter your mail" />
          <button class="btn btn--green" type="submit">Subscribe</button>
        </form>
      </div>
      <div class="footer__main">
        <div>
          <a href="#top" class="brand brand--footer"><span class="brand__mark"></span><span><strong>MediApotek</strong><small>Health & Pharmacy</small></span></a>
          <p>Subscribe to our newsletter today to receive latest health information and pharmacy promo.</p>
          <p>📍 2478 Street City Ohio 90255</p>
          <p>✉ info@mediapotek.com</p>
          <p>☎ +(402) 763 282 46</p>
        </div>
        <div><h3>Quick Link</h3><a href="#about">About Us</a><a href="#services">Our Services</a><a href="#appointment">Appointment</a><a href="#contact">Contact Us</a><a href="#">Privacy Policy</a></div>
        <div><h3>Popular Service</h3><a href="#">Cardiology Care</a><a href="#">Urgent Care</a><a href="#">Orthopedic Care</a><a href="#">Diagnosis Department</a><a href="#">Dental Service</a></div>
        <div><h3>Recent Post</h3><div class="recent"><img src="<?php echo e(asset('assets/img/blog-1.svg')); ?>" alt="Recent"/><span>Provide a detailed list of the medical<br/><small>08 Nov, 2026</small></span></div><div class="recent"><img src="<?php echo e(asset('assets/img/blog-2.svg')); ?>" alt="Recent"/><span>Provide a detailed list of the medical<br/><small>08 Nov, 2026</small></span></div></div>
      </div>
      <div class="footer__bottom">
        <span>Copyright 2026 <b>MediApotek</b>. All Rights Reserved.</span>
        <div><a href="#">f</a><a href="#">x</a><a href="#">ig</a><a href="#">in</a></div>
      </div>
    </footer>
  </div>
  <script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\Users\LENOVO\Downloads\MD-Farma-Laravel-XAMPP-PHP83\MD-Farma-Laravel-XAMPP\resources\views/welcome.blade.php ENDPATH**/ ?>