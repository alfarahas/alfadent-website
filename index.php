<?php
$brandName = "AlfaDent";
$tagline = "Smart Dental Clinic Management Software";
$phone = "9112323123";
$email = "dental@info.in";
$address = "Satara, Kolhapur";
$logoIcon = '<span class="logo-inner" aria-hidden="true"><svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21.2 9.8C24.5 8.7 27.3 10.1 29.7 11.5C31.3 12.4 32.7 12.4 34.3 11.5C36.7 10.1 39.5 8.7 42.8 9.8C49.9 12.2 52.4 21.3 48.6 28.2C46.8 31.4 45.9 35 45.5 38.7L44.6 46.8C44.1 51.3 38.1 52.3 36.3 48.1L34.2 43.1C33.2 40.7 30.8 40.7 29.8 43.1L27.7 48.1C25.9 52.3 19.9 51.3 19.4 46.8L18.5 38.7C18.1 35 17.2 31.4 15.4 28.2C11.6 21.3 14.1 12.2 21.2 9.8Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>';

$formSubmitted = false;
$name = $clinic = $userPhone = $message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $formSubmitted = true;
    $name = htmlspecialchars(trim($_POST["name"] ?? ""));
    $clinic = htmlspecialchars(trim($_POST["clinic"] ?? ""));
    $userPhone = htmlspecialchars(trim($_POST["phone"] ?? ""));
    $message = htmlspecialchars(trim($_POST["message"] ?? ""));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $brandName; ?> - Dental Management System</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        :root {
            --primary: #98144f;
            --primary-dark: #69082f;
            --primary-soft: #fff0f6;
            --primary-light: #bd2d6b;
            --text: #18181b;
            --muted: #68606a;
            --bg: #fbfbfd;
            --white: #ffffff;
            --border: #ece7eb;
            --shadow: 0 24px 70px rgba(22, 20, 24, 0.10);
            --shadow-soft: 0 16px 40px rgba(152, 20, 79, 0.12);
            --success: #0f9d58;
        }

        body {
            font-family: 'Inter', Arial, Helvetica, sans-serif;
            background:
                radial-gradient(circle at 10% 0%, rgba(152, 20, 79, 0.08), transparent 28%),
                radial-gradient(circle at 90% 10%, rgba(152, 20, 79, 0.08), transparent 24%),
                var(--bg);
            color: var(--text);
            line-height: 1.65;
            overflow-x: hidden;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .container {
            width: min(1180px, 92%);
            margin: auto;
        }

        .header {
            position: sticky;
            top: 0;
            z-index: 50;
            background: rgba(255, 255, 255, 0.78);
            backdrop-filter: blur(18px);
            border-bottom: 1px solid rgba(236, 231, 235, 0.85);
        }

        .nav {
            min-height: 78px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 13px;
            font-weight: 900;
            color: var(--primary);
            font-size: 28px;
            letter-spacing: -0.8px;
        }

        .brand-icon {
            width: 52px;
            height: 52px;
            border-radius: 18px;
            background: linear-gradient(145deg, var(--primary), var(--primary-dark));
            color: var(--white);
            display: grid;
            place-items: center;
            font-size: 28px;
            box-shadow: 0 16px 34px rgba(152, 20, 79, 0.25);
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 30px;
            color: #383038;
            font-weight: 700;
            font-size: 15px;
        }

        .menu a {
            position: relative;
        }

        .menu a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -7px;
            width: 0;
            height: 3px;
            border-radius: 99px;
            background: var(--primary);
            transition: 0.25s ease;
        }

        .menu a:hover::after {
            width: 100%;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: none;
            border-radius: 999px;
            padding: 14px 25px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            font-weight: 900;
            cursor: pointer;
            box-shadow: 0 18px 38px rgba(152, 20, 79, 0.26);
            transition: 0.25s ease;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 22px 46px rgba(152, 20, 79, 0.34);
        }

        .btn-outline {
            background: rgba(255, 255, 255, 0.92);
            color: var(--primary);
            border: 1px solid rgba(152, 20, 79, 0.18);
            box-shadow: none;
        }

        .hero {
            position: relative;
            overflow: hidden;
            padding: 88px 0 72px;
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.96) 0%, rgba(255, 246, 250, 0.95) 100%);
        }

        .hero::before,
        .hero::after {
            content: "";
            position: absolute;
            border-radius: 999px;
            pointer-events: none;
        }

        .hero::before {
            right: -170px;
            top: -180px;
            width: 460px;
            height: 460px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            opacity: 0.14;
        }

        .hero::after {
            left: -130px;
            bottom: -160px;
            width: 340px;
            height: 340px;
            background: var(--primary);
            opacity: 0.07;
        }

        .hero-grid {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: 1.02fr 0.98fr;
            align-items: center;
            gap: 56px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 16px;
            border-radius: 999px;
            background: rgba(152, 20, 79, 0.08);
            color: var(--primary);
            font-weight: 900;
            margin-bottom: 22px;
            border: 1px solid rgba(152, 20, 79, 0.12);
        }

        .hero h1 {
            font-size: clamp(44px, 5.8vw, 76px);
            line-height: 1.02;
            margin-bottom: 20px;
            letter-spacing: -3px;
        }

        .hero h1 span {
            color: var(--primary);
        }

        .hero p {
            color: var(--muted);
            font-size: 19px;
            max-width: 620px;
            margin-bottom: 32px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 14px;
            margin-bottom: 36px;
        }

        .hero-points {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
        }

        .point {
            background: rgba(255, 255, 255, 0.78);
            border: 1px solid rgba(236, 231, 235, 0.95);
            border-radius: 20px;
            padding: 17px;
            box-shadow: 0 12px 34px rgba(0, 0, 0, 0.05);
            font-weight: 800;
            backdrop-filter: blur(12px);
        }

        .mockup {
            position: relative;
            background: linear-gradient(135deg, #19151a, #050505);
            border-radius: 32px;
            padding: 16px;
            box-shadow: 0 38px 82px rgba(20, 18, 22, 0.22);
            transform: rotate(1deg);
        }

        .mockup::before {
            content: "";
            position: absolute;
            inset: -14px;
            border-radius: 40px;
            background: linear-gradient(135deg, rgba(152, 20, 79, 0.18), rgba(255, 255, 255, 0.1));
            z-index: -1;
            filter: blur(2px);
        }

        .screen {
            background: var(--white);
            border-radius: 22px;
            overflow: hidden;
            min-height: 470px;
        }

        .screen-top {
            height: 62px;
            background: linear-gradient(180deg, #ffffff, #f8f6f8);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 22px;
            color: var(--muted);
            font-size: 13px;
            border-bottom: 1px solid var(--border);
        }

        .dashboard {
            display: grid;
            grid-template-columns: 155px 1fr;
            min-height: 412px;
        }

        .sidebar {
            background: linear-gradient(180deg, var(--primary), var(--primary-dark));
            color: var(--white);
            padding: 19px 17px;
        }

        .mini-logo {
            width: 54px;
            height: 54px;
            border-radius: 16px;
            background: var(--white);
            color: var(--primary);
            display: grid;
            place-items: center;
            margin-bottom: 22px;
            font-size: 25px;
            box-shadow: inset 0 0 0 1px rgba(152, 20, 79, 0.08);
        }

        .side-item {
            padding: 11px 0;
            font-size: 13px;
            opacity: 0.96;
            font-weight: 700;
        }

        .dash-content {
            padding: 18px;
            background: #fff;
        }

        .welcome {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            padding: 15px 18px;
            border-radius: 14px;
            margin-bottom: 16px;
            font-weight: 900;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            margin-bottom: 16px;
        }

        .stat {
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 12px;
            font-size: 12px;
            background: #fff;
        }

        .stat strong {
            display: block;
            color: var(--primary);
            font-size: 18px;
            margin-top: 4px;
        }

        .quick {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-bottom: 16px;
        }

        .quick-card {
            background: #faf7f9;
            border: 1px solid #f0e8ed;
            border-radius: 14px;
            padding: 14px 10px;
            text-align: center;
            font-size: 12px;
            font-weight: 800;
        }

        .table-box {
            border: 1px solid var(--border);
            border-radius: 14px;
            overflow: hidden;
            background: #fff;
        }

        .row {
            display: flex;
            justify-content: space-between;
            padding: 10px 12px;
            border-bottom: 1px solid var(--border);
            font-size: 12px;
        }

        .row:last-child {
            border-bottom: none;
        }

        .section {
            padding: 86px 0;
        }

        .section-title {
            text-align: center;
            max-width: 780px;
            margin: 0 auto 48px;
        }

        .section-title h2 {
            font-size: clamp(34px, 4vw, 48px);
            margin-bottom: 13px;
            letter-spacing: -1.5px;
            line-height: 1.14;
        }

        .section-title h2 span {
            color: var(--primary);
        }

        .section-title p {
            color: var(--muted);
            font-size: 17px;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .feature-card {
            position: relative;
            background: rgba(255, 255, 255, 0.88);
            border-radius: 28px;
            padding: 30px;
            border: 1px solid rgba(236, 231, 235, 0.95);
            box-shadow: 0 18px 42px rgba(0, 0, 0, 0.045);
            transition: 0.25s ease;
            overflow: hidden;
        }

        .feature-card::after {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 86px;
            height: 86px;
            background: rgba(152, 20, 79, 0.06);
            border-bottom-left-radius: 80px;
        }

        .feature-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 22px 55px rgba(152, 20, 79, 0.13);
        }

        .icon {
            width: 62px;
            height: 62px;
            display: grid;
            place-items: center;
            border-radius: 20px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            font-size: 28px;
            margin-bottom: 20px;
            box-shadow: 0 16px 32px rgba(152, 20, 79, 0.22);
        }

        .feature-card h3 {
            font-size: 21px;
            margin-bottom: 9px;
        }

        .feature-card p {
            color: var(--muted);
        }

        .why {
            background: linear-gradient(180deg, #ffffff, #fff7fb);
        }

        .why-grid {
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            gap: 40px;
            align-items: center;
        }

        .why-box {
            position: relative;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            border-radius: 34px;
            padding: 46px;
            box-shadow: 0 28px 65px rgba(152, 20, 79, 0.25);
            overflow: hidden;
        }

        .why-box::after {
            content: "🦷";
            position: absolute;
            right: 26px;
            bottom: 8px;
            font-size: 120px;
            opacity: 0.08;
        }

        .why-box h2 {
            font-size: 42px;
            line-height: 1.1;
            margin-bottom: 18px;
            letter-spacing: -1.5px;
        }

        .why-box p {
            opacity: 0.9;
            margin-bottom: 24px;
        }

        .list {
            display: grid;
            gap: 16px;
        }

        .list-item {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 22px;
            padding: 20px 22px;
            display: flex;
            gap: 15px;
            align-items: flex-start;
            box-shadow: 0 14px 34px rgba(0, 0, 0, 0.05);
        }

        .check {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            display: grid;
            place-items: center;
            flex: 0 0 auto;
            font-weight: 900;
        }
        .pricing {
            background: #ffffff;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .pricing-card {
            position: relative;
            background: rgba(255, 255, 255, 0.94);
            border: 1px solid var(--border);
            border-radius: 30px;
            padding: 32px;
            box-shadow: 0 18px 45px rgba(0, 0, 0, 0.055);
            transition: 0.25s ease;
        }

        .pricing-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 58px rgba(152, 20, 79, 0.13);
        }

        .pricing-card.popular {
            border: 2px solid var(--primary);
            box-shadow: 0 24px 60px rgba(152, 20, 79, 0.16);
        }

        .popular-badge {
            position: absolute;
            top: 18px;
            right: 18px;
            background: var(--primary);
            color: #ffffff;
            padding: 7px 13px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 900;
        }

        .pricing-card h3 {
            font-size: 24px;
            margin-bottom: 8px;
        }

        .pricing-card p {
            color: var(--muted);
            margin-bottom: 18px;
        }

        .price {
            display: flex;
            align-items: flex-end;
            gap: 6px;
            margin-bottom: 8px;
        }

        .price strong {
            font-size: 42px;
            line-height: 1;
            color: var(--primary);
            letter-spacing: -1.5px;
        }

        .price span {
            color: var(--muted);
            font-weight: 700;
            padding-bottom: 5px;
        }

        .yearly-price {
            color: var(--success);
            font-weight: 900;
            margin-bottom: 20px;
        }

        .pricing-list {
            list-style: none;
            display: grid;
            gap: 12px;
            margin-bottom: 26px;
        }

        .pricing-list li {
            display: flex;
            gap: 10px;
            align-items: flex-start;
            color: #383038;
            font-weight: 600;
        }

        .pricing-list li::before {
            content: "✓";
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: var(--primary-soft);
            color: var(--primary);
            display: grid;
            place-items: center;
            flex: 0 0 auto;
            font-size: 13px;
            font-weight: 900;
        }

        .pricing-note {
            margin-top: 24px;
            text-align: center;
            color: var(--muted);
            font-weight: 700;
        }

        .contact {
            background:
                radial-gradient(circle at top right, rgba(152, 20, 79, 0.14), transparent 32%),
                linear-gradient(135deg, #ffffff 0%, #faf4f7 100%);
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            gap: 36px;
        }

        .contact-card,
        .form-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 32px;
            padding: 36px;
            border: 1px solid rgba(236, 231, 235, 0.95);
            box-shadow: var(--shadow);
            backdrop-filter: blur(14px);
        }

        .contact-line {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 17px 0;
            border-bottom: 1px solid var(--border);
        }

        .contact-line:last-child {
            border-bottom: none;
        }

        .contact-icon {
            width: 48px;
            height: 48px;
            border-radius: 16px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            display: grid;
            place-items: center;
            font-size: 22px;
            box-shadow: 0 12px 26px rgba(152, 20, 79, 0.18);
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .field {
            margin-bottom: 16px;
        }

        .field.full {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            font-weight: 900;
            margin-bottom: 7px;
        }

        input,
        textarea {
            width: 100%;
            border: 1px solid #ded6dc;
            border-radius: 16px;
            padding: 15px 16px;
            font: inherit;
            outline: none;
            background: #ffffff;
            transition: 0.2s ease;
        }

        input:focus,
        textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 5px rgba(152, 20, 79, 0.10);
        }

        textarea {
            min-height: 132px;
            resize: vertical;
        }

        .alert {
            background: #eaf7ef;
            color: var(--success);
            border: 1px solid #ccebd8;
            padding: 14px 16px;
            border-radius: 16px;
            margin-bottom: 18px;
            font-weight: 800;
        }

        .floating-call {
            position: fixed;
            right: 22px;
            bottom: 22px;
            z-index: 60;
            width: 58px;
            height: 58px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            display: grid;
            place-items: center;
            font-size: 24px;
            box-shadow: 0 18px 42px rgba(152, 20, 79, 0.35);
            transition: 0.25s ease;
        }

        .floating-call:hover {
            transform: translateY(-4px) scale(1.04);
        }

        .footer {
            background: linear-gradient(135deg, var(--primary-dark), #43041d);
            color: var(--white);
            padding: 30px 0;
        }

        .footer-grid {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
            opacity: 0.95;
        }
        .tooth-logo {
            position: relative;
            overflow: hidden;
            background: #ffffff !important;
            color: #ffffff !important;
            border: 1px solid rgba(152, 20, 79, 0.12);
        }

        .tooth-logo .logo-inner {
            width: 68%;
            height: 68%;
            border-radius: 14px;
            background: linear-gradient(145deg, var(--primary), var(--primary-dark));
            display: grid;
            place-items: center;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.16), 0 8px 18px rgba(152, 20, 79, 0.18);
        }

        .tooth-logo svg {
            width: 72%;
            height: 72%;
            display: block;
        }

        .brand-icon.tooth-logo {
            box-shadow: 0 16px 34px rgba(152, 20, 79, 0.16);
        }

        .mini-logo.tooth-logo {
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.10);
        }

        @media (max-width: 980px) {
            .menu {
                display: none;
            }

            .hero-grid,
            .why-grid,
            .contact-grid {
                grid-template-columns: 1fr;
            }

            .features,
            .pricing-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 640px) {
            .nav {
                min-height: 70px;
            }

            .brand {
                font-size: 23px;
            }

            .brand-icon {
                width: 46px;
                height: 46px;
            }

            .hero {
                padding: 56px 0 44px;
            }

            .hero-points,
            .features,
            .pricing-grid,
            .stats,
            .quick,
            .form-grid {
                grid-template-columns: 1fr;
            }

            .dashboard {
                grid-template-columns: 1fr;
            }

            .sidebar {
                display: none;
            }

            .screen {
                min-height: auto;
            }

            .hero h1 {
                letter-spacing: -1.5px;
            }

            .contact-card,
            .form-card,
            .why-box {
                padding: 25px;
            }

            .mockup {
                padding: 10px;
                border-radius: 24px;
            }

            .floating-call {
                right: 16px;
                bottom: 16px;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container nav">
            <a href="#home" class="brand">
                <span class="brand-icon tooth-logo"><?php echo $logoIcon; ?></span>
                <span><?php echo $brandName; ?></span>
            </a>

            <nav class="menu">
                <a href="#features">Features</a>
                <a href="#why">Why Us</a>
                <a href="#pricing">Pricing</a>
                <a href="#contact">Contact</a>
            </nav>

            <a class="btn" href="#contact">Book Demo</a>
        </div>
    </header>

    <main>
        <section class="hero" id="home">
            <div class="container hero-grid">
                <div>
                    <div class="badge">🛡️ Secure. Reliable. Built for Dental Clinics.</div>
                    <h1><span><?php echo $brandName; ?></span><br>Dental Management System</h1>
                    <p><?php echo $tagline; ?> for appointments, billing, prescriptions, patients, reports and daily clinic operations.</p>

                    <div class="hero-actions">
                        <a class="btn" href="#contact">Book a Demo Today</a>
                        <a class="btn btn-outline" href="tel:<?php echo $phone; ?>">Call <?php echo $phone; ?></a>
                    </div>

                    <div class="hero-points">
                        <div class="point">✅ Easy Billing</div>
                        <div class="point">✅ Fast Appointments</div>
                        <div class="point">✅ Smart Reports</div>
                    </div>
                </div>

                <div class="mockup">
                    <div class="screen">
                        <div class="screen-top">
                            <strong><?php echo $brandName; ?> Dashboard</strong>
                            <span>Administrator</span>
                        </div>

                        <div class="dashboard">
                            <aside class="sidebar">
                                <div class="mini-logo tooth-logo"><?php echo $logoIcon; ?></div>
                                <div class="side-item">🏠 Dashboard</div>
                                <div class="side-item">👥 Patients</div>
                                <div class="side-item">📅 Appointments</div>
                                <div class="side-item">🧾 Billing</div>
                                <div class="side-item">Rx Prescriptions</div>
                                <div class="side-item">📊 Reports</div>
                            </aside>

                            <div class="dash-content">
                                <div class="welcome">Welcome back! 👋</div>

                                <div class="stats">
                                    <div class="stat">Patients <strong>1,248</strong></div>
                                    <div class="stat">Appointments <strong>28</strong></div>
                                    <div class="stat">Revenue <strong>₹45,860</strong></div>
                                    <div class="stat">Pending <strong>16</strong></div>
                                </div>

                                <div class="quick">
                                    <div class="quick-card">👤 New Patient</div>
                                    <div class="quick-card">🧾 Create Bill</div>
                                    <div class="quick-card">📅 Appointment</div>
                                </div>

                                <div class="table-box">
                                    <div class="row"><strong>Riya Sharma</strong><span>Cleaning</span></div>
                                    <div class="row"><strong>Aman Verma</strong><span>Root Canal</span></div>
                                    <div class="row"><strong>Neha Kapoor</strong><span>Whitening</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" id="features">
            <div class="container">
                <div class="section-title">
                    <h2>Everything your clinic needs in <span>one software</span></h2>
                    <p>Manage daily dental clinic work faster, reduce paperwork, and give patients a smoother experience.</p>
                </div>

                <div class="features">
                    <div class="feature-card">
                        <div class="icon">📅</div>
                        <h3>Appointment Booking</h3>
                        <p>Schedule, reschedule and manage patient appointments with ease.</p>
                    </div>

                    <div class="feature-card">
                        <div class="icon">🧾</div>
                        <h3>Billing & Invoices</h3>
                        <p>Create invoices, track payments, pending dues and clinic revenue.</p>
                    </div>

                    <div class="feature-card">
                        <div class="icon">Rx</div>
                        <h3>Prescriptions</h3>
                        <p>Create and manage digital prescriptions quickly and securely.</p>
                    </div>

                    <div class="feature-card">
                        <div class="icon">👥</div>
                        <h3>Patient Management</h3>
                        <p>Keep patient records, treatment history and communication in one place.</p>
                    </div>

                    <div class="feature-card">
                        <div class="icon">📊</div>
                        <h3>Reports</h3>
                        <p>View useful reports to track performance and grow your practice.</p>
                    </div>

                    <div class="feature-card">
                        <div class="icon">🔒</div>
                        <h3>Secure Access</h3>
                        <p>Built for reliable daily use with secure clinic data management.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section why" id="why">
            <div class="container why-grid">
                <div class="why-box">
                    <h2>Simplify daily operations and grow your practice</h2>
                    <p><?php echo $brandName; ?> helps dental clinics save time, reduce errors and manage work from one smart dashboard.</p>
                    <a class="btn btn-outline" href="#contact">Get Started</a>
                </div>

                <div class="list">
                    <div class="list-item">
                        <span class="check">✓</span>
                        <div>
                            <h3>Less paperwork</h3>
                            <p>Digitize patient records, billing and prescriptions.</p>
                        </div>
                    </div>

                    <div class="list-item">
                        <span class="check">✓</span>
                        <div>
                            <h3>Better clinic control</h3>
                            <p>Track appointments, payments and reports from one dashboard.</p>
                        </div>
                    </div>

                    <div class="list-item">
                        <span class="check">✓</span>
                        <div>
                            <h3>Professional patient experience</h3>
                            <p>Make your clinic workflow faster, cleaner and more organized.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section pricing" id="pricing">
            <div class="container">
                <div class="section-title">
                    <h2>Simple <span>pricing plans</span></h2>
                    <p>Affordable plans for small and growing dental clinics. Start low, upgrade when your clinic grows.</p>
                </div>

                <div class="pricing-grid">
                    <div class="pricing-card">
                        <h3>Starter</h3>
                        <p>Best for a small clinic starting with digital records.</p>
                        <div class="price"><strong>₹299</strong><span>/month</span></div>
                        <div class="yearly-price">₹2,999/year</div>
                        <ul class="pricing-list">
                            <li>Patient management</li>
                            <li>Appointment booking</li>
                            <li>Basic prescriptions</li>
                            <li>Daily clinic summary</li>
                            <li>1 user access</li>
                        </ul>
                        <a class="btn btn-outline" href="#contact">Choose Starter</a>
                    </div>

                    <div class="pricing-card popular">
                        <span class="popular-badge">Best Value</span>
                        <h3>Clinic Plus</h3>
                        <p>Most suitable plan for regular dental clinics.</p>
                        <div class="price"><strong>₹499</strong><span>/month</span></div>
                        <div class="yearly-price">₹4,999/year</div>
                        <ul class="pricing-list">
                            <li>Everything in Starter</li>
                            <li>Billing and invoices</li>
                            <li>Payment and due tracking</li>
                            <li>Reports and analytics</li>
                            <li>Up to 3 user access</li>
                        </ul>
                        <a class="btn" href="#contact">Choose Clinic Plus</a>
                    </div>

                    <div class="pricing-card">
                        <h3>Pro</h3>
                        <p>For clinics that need more users and priority support.</p>
                        <div class="price"><strong>₹799</strong><span>/month</span></div>
                        <div class="yearly-price">₹7,999/year</div>
                        <ul class="pricing-list">
                            <li>Everything in Clinic Plus</li>
                            <li>Advanced reports</li>
                            <li>Multi-user staff access</li>
                            <li>Data backup support</li>
                            <li>Priority support</li>
                        </ul>
                        <a class="btn btn-outline" href="#contact">Choose Pro</a>
                    </div>
                </div>

                <p class="pricing-note">Suggested launch offer: free setup for early customers. GST, customization, SMS/WhatsApp charges can be added separately if applicable.</p>
            </div>
        </section>

        <section class="section contact" id="contact">
            <div class="container contact-grid">
                <div class="contact-card">
                    <div class="section-title" style="text-align:left; margin:0 0 24px;">
                        <h2>Book a <span>demo</span></h2>
                        <p>Ready to transform your dental clinic? Contact us today.</p>
                    </div>

                    <div class="contact-line">
                        <div class="contact-icon">☎</div>
                        <div>
                            <strong>Phone</strong><br>
                            <a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
                        </div>
                    </div>

                    <div class="contact-line">
                        <div class="contact-icon">✉</div>
                        <div>
                            <strong>Email</strong><br>
                            <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                        </div>
                    </div>

                    <div class="contact-line">
                        <div class="contact-icon">📍</div>
                        <div>
                            <strong>Address</strong><br>
                            <?php echo $address; ?>
                        </div>
                    </div>
                </div>

                <div class="form-card">
                    <?php if ($formSubmitted): ?>
                        <div class="alert">
                            Thank you, <?php echo $name ?: "Doctor"; ?>. Your demo request has been received.
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="#contact">
                        <div class="form-grid">
                            <div class="field">
                                <label for="name">Your Name</label>
                                <input type="text" id="name" name="name" placeholder="Enter your name" required>
                            </div>

                            <div class="field">
                                <label for="clinic">Clinic Name</label>
                                <input type="text" id="clinic" name="clinic" placeholder="Enter clinic name" required>
                            </div>

                            <div class="field full">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone" placeholder="Enter phone number" required>
                            </div>

                            <div class="field full">
                                <label for="message">Message</label>
                                <textarea id="message" name="message" placeholder="Tell us about your clinic requirement"></textarea>
                            </div>
                        </div>

                        <button class="btn" type="submit">Submit Demo Request</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container footer-grid">
            <div>© <?php echo date("Y"); ?> <?php echo $brandName; ?>. All rights reserved.</div>
            <div><?php echo $phone; ?> | <?php echo $email; ?> | <?php echo $address; ?></div>
        </div>
    </footer>

    <a class="floating-call" href="tel:<?php echo $phone; ?>" aria-label="Call AlfaDent">☎</a>
</body>
</html>
