<style>
  footer.site-footer {
    background-color: #2a2a2a;
    color: #fff;
    padding: 40px 20px 10px;
    font-family: 'Segoe UI', sans-serif;
  }

  .footer-container {
    max-width: 1200px;
    margin: auto;
  }

  .footer-logo {
    text-align: center;
    margin-bottom: 30px;
  }

  .footer-columns {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 30px;
    padding-bottom: 30px;
  }

  .footer-columns div {
    flex: 1 1 150px;
  }

  .footer-columns h4 {
    color: #fff;
    margin-bottom: 10px;
    border-bottom: 2px solid #c1272d;
    display: inline-block;
    padding-bottom: 4px;
    font-size: 16px;
  }

  .footer-columns ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .footer-columns li {
    font-size: 14px;
    color: #ddd;
    margin: 6px 0;
  }

  .footer-bottom {
    border-top: 1px solid #444;
    padding-top: 20px;
    font-size: 13px;
    text-align: center;
    color: #bbb;
  }

  .footer-bottom .social {
    margin-top: 10px;
  }

  .footer-bottom .social a {
    display: inline-block;
    margin: 0 6px;
  }

  .footer-bottom .social img {
    height: 22px;
    width: 22px;
    filter: grayscale(100%) brightness(120%);
  }

  @media (max-width: 768px) {
    .footer-columns {
      flex-direction: column;
      align-items: flex-start;
    }

    .footer-columns div {
      width: 100%;
    }

    .footer-logo img {
      height: 40px;
    }
  }
</style>

<footer class="site-footer">
  <div class="footer-container">
    <div class="footer-logo">
      <img src="assets/images/bseri-logo.png" alt="BSERI Logo" style="height: 60px;">
    </div>

    <div class="footer-columns">
      <div>
        <h4>Training & Certification</h4>
        <ul>
          <li>MSF Course</li>
          <li>ISO 9001</li>
          <li>ISO 27002</li>
          <li>ISO 42001</li>
          <li>ISO 20000</li>
        </ul>
      </div>
      <div>
        <h4>Resources</h4>
        <ul>
          <li>Training Course</li>
          <li>Catalog</li>
          <li>Articles</li>
          <li>Info Kits</li>
        </ul>
      </div>
      <div>
        <h4>Network</h4>
        <ul>
          <li>Trainers</li>
          <li>Exam Partners</li>
        </ul>
      </div>
      <div>
        <h4>Examination</h4>
        <ul>
          <li>Exam Rules and Policies</li>
          <li>Online Exam Manual</li>
          <li>Candidate Handbooks</li>
        </ul>
      </div>
      <div>
        <h4>Certification</h4>
        <ul>
          <li>Trainers</li>
          <li>Certification Rules</li>
          <li>Maintenance</li>
          <li>Verification</li>
        </ul>
      </div>
      <div>
        <h4>Company</h4>
        <ul>
          <li>About Us</li>
          <li>Leadership and Team</li>
          <li>Affiliations</li>
          <li>Jobs & Careers</li>
        </ul>
      </div>
    </div>

    <div class="footer-bottom">
      <p>
        Terms, Conditions, and Policies | Privacy Statement | Cookie Preferences<br>
        &copy; <?= date('Y') ?> Business Systems Education & Research Institute. All rights reserved.
      </p>
      <div class="social">
        <a href="#"><img src="assets/images/icon-linkedin.png" alt="LinkedIn"></a>
        <a href="#"><img src="assets/images/icon-instagram.png" alt="Instagram"></a>
      </div>
    </div>
  </div>
</footer>
