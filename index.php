<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>معرض أعمالي  </title>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet" />
  <style>
    /* خطوط وألوان عامة */
    body {
      font-family: 'Cairo', sans-serif;
      margin: 0;
      padding: 0;
      direction: rtl;
      background: #f9f6f2; /* أبيض مع لمسة بنية */
      color: #4a3f35; /* بني داكن */
      scroll-behavior: smooth;
      overflow-x: hidden;
      line-height: 1.6;
    }

    /* الهيدر */
    header {
      background: linear-gradient(135deg, #a1866f, #d9c9b6);
      color: #222;
      padding: 5rem 1rem 6rem;
      text-align: center;
      box-shadow: 0 4px 15px rgb(161 134 111 / 0.4);
      position: relative;
      border-bottom-left-radius: 50% 20%;
      border-bottom-right-radius: 50% 20%;
    }

    header h1 {
      font-size: 4rem;
      margin-bottom: 0.5rem;
      font-weight: 900;
      letter-spacing: 2px;
      text-shadow: 1px 1px 4px #6f5e4dcc;
    }

    header p {
      font-size: 1.6rem;
      font-weight: 600;
      color: #5b4c3fdd;
    }

    /* شريط التنقل */
    nav {
      background-color: #3f3322;
      color: #f9f6f2;
      padding: 1.2rem 0;
      text-align: center;
      position: sticky;
      top: 0;
      z-index: 1100;
      box-shadow: 0 2px 8px #3f332222;
      font-weight: 700;
      letter-spacing: 0.04em;
    }

    nav a {
      color: #f9f6f2;
      margin: 0 1.8rem;
      text-decoration: none;
      font-size: 1.3rem;
      transition: color 0.3s ease, transform 0.3s ease;
      padding-bottom: 3px;
      border-bottom: 3px solid transparent;
    }

    nav a:hover,
    nav a:focus {
      color: #d9c9b6;
      border-bottom-color: #d9c9b6;
      transform: translateY(-3px);
    }

    /* الأقسام */
    section {
      max-width: 900px;
      margin: 5rem auto;
      background: white;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgb(161 134 111 / 0.1);
      padding: 3rem 2.5rem;
      opacity: 0;
      transform: translateY(60px);
      transition: all 0.8s ease-out;
    }

    section.visible {
      opacity: 1;
      transform: translateY(0);
    }

    /* عناوين الأقسام */
    section h2 {
      font-size: 2.8rem;
      margin-bottom: 1.5rem;
      color: #5b4c3f;
      font-weight: 800;
      position: relative;
      padding-bottom: 8px;
      letter-spacing: 0.04em;
    }

    section h2::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 90px;
      height: 5px;
      background: linear-gradient(90deg, #a1866f, #d9c9b6);
      border-radius: 4px;
    }

    /* نص الفقرة */
    section p, section ul, section ol {
      font-size: 1.3rem;
      color: #6b5e4b;
      max-width: 720px;
      margin: 0 auto;
    }

    ul {
      padding-left: 20px;
      list-style-type: square;
      margin-top: 1rem;
    }

    ul li {
      margin-bottom: 0.7rem;
    }

    /* مشاريع */
    .projects {
      display: grid;
      grid-template-columns: repeat(auto-fit,minmax(280px,1fr));
      gap: 2.5rem;
      margin-top: 3rem;
    }

    .project {
      background: #f0e9db;
      border-radius: 20px;
      box-shadow: 0 10px 25px rgb(161 134 111 / 0.25);
      padding: 1.5rem;
      text-align: center;
      transition: transform 0.4s ease, box-shadow 0.4s ease;
      cursor: pointer;
      position: relative;
      overflow: hidden;
    }

    .project:hover {
      transform: translateY(-12px);
      box-shadow: 0 20px 45px rgb(161 134 111 / 0.5);
    }

    .project img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgb(161 134 111 / 0.2);
      margin-bottom: 1rem;
      transition: transform 0.4s ease;
    }

    .project:hover img {
      transform: scale(1.05);
    }

    .project h3 {
      font-size: 1.5rem;
      color: #4a3f35;
      margin-bottom: 0.6rem;
      font-weight: 700;
    }

    .project a {
      display: inline-block;
      margin-top: 0.8rem;
      padding: 0.7rem 1.5rem;
      background: #a1866f;
      color: white;
      border-radius: 15px;
      text-decoration: none;
      font-weight: 700;
      font-size: 1.1rem;
      box-shadow: 0 4px 12px rgb(161 134 111 / 0.3);
      transition: background 0.3s ease, box-shadow 0.3s ease;
    }

    .project a:hover {
      background: #6f5e4d;
      box-shadow: 0 6px 18px rgb(111 94 77 / 0.6);
    }

    /* قسم التواصل */
    #contact a {
      color: #a1866f;
      font-weight: 700;
      font-size: 1.3rem;
      text-decoration: underline;
    }

    #contact a:hover {
      color: #6f5e4d;
    }

    /* الفوتر */
    footer {
      background: #3f3322;
      color: #f9f6f2;
      padding: 2.8rem 1rem;
      text-align: center;
      font-weight: 600;
      letter-spacing: 0.05em;
      box-shadow: inset 0 4px 8px #2f271a;
    }

    /* تحريك الأقسام عند الظهور */
    @media (prefers-reduced-motion: no-preference) {
      section {
        will-change: opacity, transform;
      }
    }

    /* استجابة للأجهزة الصغيرة */
    @media (max-width: 600px) {
      header h1 {
        font-size: 2.8rem;
      }
      section {
        margin: 3rem 1rem;
        padding: 2rem 1.5rem;
      }
      nav a {
        margin: 0 1rem;
        font-size: 1.1rem;
      }

      /* أنيميشن للعناوين */
@keyframes fadeInUp {
  0% {
    opacity: 0;
    transform: translateY(30px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

section.visible h2 {
  animation: fadeInUp 0.8s ease forwards;
}

/* أنيميشن الأزرار عند الظهور */
@keyframes buttonPop {
  0% {
    opacity: 0;
    transform: scale(0.8);
  }
  100% {
    opacity: 1;
    transform: scale(1);
  }
}

.project a {
  opacity: 0;
  animation: buttonPop 0.6s ease forwards;
  animation-delay: 0.6s;
}

/* أنيميشن الصور عند الظهور */
section.visible .project img {
  animation: fadeInUp 1s ease forwards;
}

/* تأثير تحويم على الأزرار */
.project a:hover {
  transform: scale(1.1);
  box-shadow: 0 8px 25px rgba(111, 94, 77, 0.8);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* تأثير تحويم على الصور */
.project:hover img {
  transform: scale(1.1);
  filter: brightness(1.1);
  transition: transform 0.4s ease, filter 0.4s ease;
}

    }
  </style>
</head>
<body>
  <header>
    <h1>أهلاً بك في معرض أعمالي</h1>
    <p>تصميم وبرمجة مواقع عصرية بتجربة بصرية مبهرة</p>
  </header>

  <nav>
    <a href="#about">من أنا</a>
    <a href="#services">الخدمات</a>
    <a href="#projects">الأعمال</a>
    <a href="#skills">المهارات</a>
    <a href="#contact">تواصل</a>
  </nav>

  <section id="about">
    <h2>من أنا</h2>
    <p>أنا مطور ومصمم واجهات أمامية بخبرة تتجاوز 5 سنوات، أقدّم حلولاً إبداعية تعتمد على تقنيات حديثة لتقديم تجربة مستخدم استثنائية.</p>
  </section>

  <section id="services">
    <h2>الخدمات</h2>
    <p>أقدم خدمات متكاملة في مجال تصميم وتطوير الويب تشمل:</p>
    <ul>
      <li>✅ تصميم واجهات UI/UX بتجربة مستخدم حديثة</li>
      <li>✅ تطوير مواقع سريعة ومتجاوبة</li>
      <li>✅ برمجة صفحات HTML/CSS و React</li>
      <li>✅ صيانة وتحديث المواقع القائمة</li>
    </ul>
  </section>

  <section id="projects">
    <h2>أعمالي</h2>
    <div class="projects">
      <div class="project">
        <img src="images/project1.jpg" alt="موقع تعليمي" />
        <h3>موقع تعليمي</h3>
        <a href="#">زيارة</a>
      </div>
      <div class="project">
        <img src="images/project2.jpg" alt="متجر إلكتروني" />
        <h3>متجر إلكتروني</h3>
        <a href="#">زيارة</a>
      </div>
      <div class="project">
        <img src="images/project3.jpg" alt="مدونة تقنية" />
        <h3>مدونة تقنية</h3>
        <a href="#">زيارة</a>
      </div>
    </div>
  </section>

  <section id="skills">
    <h2>المهارات</h2>
    <p>أتقن تقنيات وأدوات التطوير الحديثة:</p>
    <p>HTML5, CSS3, JavaScript, React.js, Tailwind CSS, Git, Figma</p>
  </section>

  <section id="contact">
    <h2>تواصل معي</h2>
    <p>هل لديك مشروع؟ أو تبحث عن مصمم/مطور محترف؟ لا تتردد بالتواصل:</p>
    <p><a href="mailto:your@email.com">your@email.com</a></p>
  </section>

  <footer>
    <p>© 2025 جميع الحقوق محفوظة - معرض أعمالي</p>
  </footer>

  <script>
    const sections = document.querySelectorAll('section');
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
        }
      });
    }, { threshold: 0.15 });

    sections.forEach(section => observer.observe(section));
  </script>
</body>
</html>
