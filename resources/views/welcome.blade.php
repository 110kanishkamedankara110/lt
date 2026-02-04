<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NEXORA - Bringing You Next</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-blue: #1e40af;
            --secondary-blue: #3b82f6;
            --accent-green: #10b981;
            --accent-purple: #8b5cf6;
            --dark-bg: #0f172a;
            --light-bg: #f8fafc;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: white;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        /* Navigation Bar */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(10px);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 1rem;
            text-decoration: none;
        }

        .logo-container img {
            height: 40px;
            width: auto;
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            background: linear-gradient(to right, var(--accent-green), #3b82f6);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-link {
            color: #cbd5e1;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
            position: relative;
            padding: 0.5rem 0;
        }

        .nav-link:hover {
            color: var(--accent-green);
        }

        .nav-link.active {
            color: var(--accent-green);
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--accent-green);
            border-radius: 1px;
        }

        .nav-cta {
            background: linear-gradient(135deg, var(--accent-green), #0da271);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }

        .nav-cta:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(16, 185, 129, 0.3);
        }

        /* Mobile Menu */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .mobile-menu {
            display: none;
            position: fixed;
            top: 70px;
            left: 0;
            width: 100%;
            background: rgba(15, 23, 42, 0.98);
            backdrop-filter: blur(20px);
            padding: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .mobile-menu.active {
            display: block;
        }

        .mobile-nav-links {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .mobile-nav-link {
            color: #cbd5e1;
            text-decoration: none;
            font-weight: 500;
            padding: 0.75rem;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .mobile-nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: var(--accent-green);
        }

        /* Background Animation */
        .background-animation {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            border-radius: 50%;
            background: rgba(59, 130, 246, 0.1);
            animation: float 15s infinite linear;
        }

        .grid-overlay {
            position: fixed;
            width: 100%;
            height: 100%;
            background-image:
                linear-gradient(rgba(30, 64, 175, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(30, 64, 175, 0.05) 1px, transparent 1px);
            background-size: 50px 50px;
            top: 0;
            left: 0;
            z-index: 2;
            pointer-events: none;
        }

        /* Main Content */
        .main-container {
            position: relative;
            z-index: 10;
            width: 100%;
            min-height: 100vh;
            padding-top: 80px;
        }

        .hero-section {
            padding: 4rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .left-section {
            animation: slideInLeft 1s ease-out;
        }

        .logo-badge {
            display: inline-flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 50px;
            padding: 0.5rem 1.5rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .logo-badge i {
            color: var(--accent-green);
            margin-right: 0.5rem;
            font-size: 1.2rem;
        }

        .logo-badge span {
            font-weight: 600;
            font-size: 0.9rem;
            letter-spacing: 1px;
        }

        .main-heading {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1rem;
            background: linear-gradient(to right, #fff, #a5b4fc);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .tagline-highlight {
            font-size: 1.5rem;
            color: var(--accent-green);
            font-weight: 600;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .tagline-highlight i {
            animation: pulse 2s infinite;
        }

        .tagline {
            font-size: 1.25rem;
            line-height: 1.6;
            color: #cbd5e1;
            margin-bottom: 2.5rem;
            max-width: 500px;
        }

        /* Features Grid */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .feature-btn {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            text-align: left;
            width: 100%;
            text-decoration: none;
            color: inherit;
        }

        .feature-btn:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-5px);
            border-color: rgba(16, 185, 129, 0.3);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            background: rgba(16, 185, 129, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .feature-icon i {
            color: var(--accent-green);
            font-size: 1.5rem;
        }

        .feature-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #f1f5f9;
        }

        .feature-desc {
            font-size: 0.9rem;
            color: #94a3b8;
            margin-bottom: 1rem;
            line-height: 1.5;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            border: 1px solid;
        }

        .coming-soon {
            background: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
            border-color: rgba(245, 158, 11, 0.3);
        }

        .available {
            background: rgba(16, 185, 129, 0.1);
            color: var(--accent-green);
            border-color: rgba(16, 185, 129, 0.3);
        }

        .status-badge i {
            margin-right: 0.25rem;
            font-size: 0.7rem;
        }

        /* Right Section - Updated with Video */
        .right-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            animation: slideInRight 1s ease-out;
        }

        .logo-container-main {
            position: relative;
            margin-bottom: 2rem;
        }

        .logo {
            max-width: 400px;
            height: auto;
            filter: drop-shadow(0 10px 30px rgba(0, 0, 0, 0.5));
        }

        .logo-glow {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.3) 0%, transparent 70%);
            z-index: -1;
            animation: pulse 4s infinite alternate;
        }

        /* Video Demo Container */
        .video-demo-container {
            margin-top: 2rem;
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        .video-wrapper {
            position: relative;
            width: 100%;
            border-radius: 12px;
            overflow: hidden;
            border: 2px solid rgba(16, 185, 129, 0.3);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            background: #000;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .video-wrapper:hover {
            border-color: var(--accent-green);
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(16, 185, 129, 0.3);
        }

        .video-wrapper video {
            width: 100%;
            height: auto;
            display: block;
        }

        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .video-overlay.hidden {
            opacity: 0;
            pointer-events: none;
        }

        .play-button-container {
            text-align: center;
        }

        .play-button {
            width: 60px;
            height: 60px;
            background: var(--accent-green);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            transition: all 0.3s;
        }

        .video-overlay:hover .play-button {
            transform: scale(1.1);
            background: #0da271;
        }

        .play-button i {
            color: white;
            font-size: 1.5rem;
            margin-left: 5px;
        }

        .stats-container {
            display: flex;
            gap: 2rem;
            margin-top: 2rem;
        }

        .stat {
            text-align: center;
            padding: 1rem;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--accent-green);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* System Features Section */
        .features-section {
            padding: 4rem 2rem;
            background: rgba(255, 255, 255, 0.03);
            margin-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            color: white;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: var(--accent-green);
            border-radius: 2px;
        }

        .features-scroller {
            max-width: 1200px;
            margin: 0 auto;
            overflow: hidden;
            position: relative;
        }

        .features-track {
            display: flex;
            gap: 2rem;
            animation: scroll 40s linear infinite;
            padding: 1rem 0;
        }

        .feature-card {
            min-width: 280px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: transform 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            border-color: var(--accent-green);
        }

        .feature-card-icon {
            width: 60px;
            height: 60px;
            background: rgba(59, 130, 246, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(59, 130, 246, 0.3);
        }

        .feature-card-icon i {
            color: #3b82f6;
            font-size: 1.8rem;
        }

        .feature-card-title {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
            color: white;
        }

        .feature-card-desc {
            color: #94a3b8;
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 1rem;
        }

        .feature-card-list {
            list-style: none;
            margin-top: 1rem;
        }

        .feature-card-list li {
            color: #cbd5e1;
            font-size: 0.9rem;
            padding: 0.25rem 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .feature-card-list li i {
            color: var(--accent-green);
            font-size: 0.8rem;
        }

        /* Platform Comparison */
        .platform-comparison {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            max-width: 1200px;
            margin: 3rem auto;
        }

        .platform-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .platform-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .platform-icon-large {
            width: 70px;
            height: 70px;
            background: rgba(16, 185, 129, 0.1);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid rgba(16, 185, 129, 0.3);
        }

        .platform-icon-large i {
            color: var(--accent-green);
            font-size: 2rem;
        }

        .platform-name {
            font-size: 1.8rem;
            font-weight: 700;
        }

        .platform-tagline {
            color: #94a3b8;
            font-size: 1rem;
        }

        /* Feedback Section */
        .feedback-section {
            padding: 4rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .feedback-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .feedback-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .feedback-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .feedback-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent-green), #3b82f6);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 1.2rem;
        }

        .feedback-info h4 {
            font-size: 1.1rem;
            margin-bottom: 0.25rem;
        }

        .feedback-role {
            color: #94a3b8;
            font-size: 0.9rem;
        }

        .feedback-text {
            color: #cbd5e1;
            line-height: 1.6;
            font-style: italic;
            position: relative;
            padding-left: 1rem;
            border-left: 3px solid var(--accent-green);
        }

        .feedback-rating {
            display: flex;
            gap: 0.25rem;
            margin-top: 1rem;
        }

        .feedback-rating i {
            color: #f59e0b;
        }

        /* CTA Section */
        .cta-section {
            padding: 4rem 2rem;
            text-align: center;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(59, 130, 246, 0.1));
            margin-top: 2rem;
            border-radius: 20px;
            max-width: 1200px;
            margin: 4rem auto;
        }

        .cta-title {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: white;
        }

        .cta-text {
            font-size: 1.1rem;
            color: #cbd5e1;
            max-width: 600px;
            margin: 0 auto 2rem;
            line-height: 1.6;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 1rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--accent-green), #0da271);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
        }

        /* Clients Section */
        .clients-section {
            padding: 4rem 2rem;
            background: rgba(255, 255, 255, 0.02);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .clients-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto 3rem;
        }

        .client-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .client-card:hover {
            transform: translateY(-5px);
            border-color: var(--accent-green);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .client-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--accent-green), var(--secondary-blue));
            border-radius: 4px 4px 0 0;
        }

        .client-logo {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(59, 130, 246, 0.1));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .client-logo i {
            font-size: 2rem;
            color: var(--accent-green);
        }

        .client-name {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
            color: white;
        }

        .client-location {
            color: #94a3b8;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .client-location::before {
            content: '📍';
            font-size: 0.8rem;
        }

        .client-stats {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .client-stat {
            text-align: center;
        }

        .client-stat .stat-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--accent-green);
            display: block;
        }

        .client-stat .stat-label {
            font-size: 0.8rem;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .client-testimonial {
            position: relative;
            padding-left: 1.5rem;
        }

        .client-testimonial i.fa-quote-left {
            position: absolute;
            left: 0;
            top: 0;
            color: var(--accent-green);
            opacity: 0.5;
            font-size: 0.9rem;
        }

        .client-testimonial p {
            color: #cbd5e1;
            font-size: 0.9rem;
            line-height: 1.5;
            font-style: italic;
        }

        /* Client Statistics Banner */
        .client-stats-banner {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(59, 130, 246, 0.1));
            border-radius: 15px;
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .client-stats-banner .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            text-align: center;
        }

        .client-stats-banner .stat-item {
            padding: 1rem;
        }

        .client-stats-banner .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--accent-green);
            margin-bottom: 0.5rem;
            display: block;
        }

        .client-stats-banner .stat-label {
            font-size: 0.9rem;
            color: #cbd5e1;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Footer */
        .footer {
            padding: 3rem 2rem;
            text-align: center;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #94a3b8;
            margin-top: 4rem;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }

        .footer-link {
            color: #94a3b8;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-link:hover {
            color: var(--accent-green);
        }

        /* WhatsApp Float Button */
        .whatsapp-float {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: #25D366;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
            z-index: 1000;
            text-decoration: none;
            transition: all 0.3s;
        }

        .whatsapp-float:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 25px rgba(37, 211, 102, 0.6);
        }

        .whatsapp-float-text {
            position: absolute;
            right: 70px;
            background: #25D366;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            white-space: nowrap;
            opacity: 0;
            transition: opacity 0.3s;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .whatsapp-float:hover .whatsapp-float-text {
            opacity: 1;
        }

        /* Animations */
        @keyframes float {
            0% {
                transform: translate(0, 0) rotate(0deg);
            }

            33% {
                transform: translate(30px, -50px) rotate(120deg);
            }

            66% {
                transform: translate(-20px, 20px) rotate(240deg);
            }

            100% {
                transform: translate(0, 0) rotate(360deg);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes pulse {
            0% {
                opacity: 0.5;
                transform: scale(1);
            }

            50% {
                opacity: 1;
                transform: scale(1.05);
            }

            100% {
                opacity: 0.5;
                transform: scale(1);
            }
        }

        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(calc(-280px * 8 - 2rem * 8));
            }
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .hero-section {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .left-section,
            .right-section {
                text-align: center;
            }

            .features-grid {
                max-width: 600px;
                margin-left: auto;
                margin-right: auto;
            }

            .feature-btn {
                align-items: center;
                text-align: center;
            }

            .main-heading {
                font-size: 3rem;
            }

            .platform-comparison {
                grid-template-columns: 1fr;
            }

            .video-demo-container {
                max-width: 500px;
                margin: 2rem auto;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }

            .main-heading {
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .features-scroller {
                overflow-x: auto;
            }

            .features-track {
                animation: none;
                flex-wrap: nowrap;
            }

            .feature-card {
                min-width: 280px;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                max-width: 300px;
                justify-content: center;
            }

            .stats-container {
                flex-direction: column;
                gap: 1rem;
            }

            .logo {
                max-width: 300px;
            }

            .client-stats-banner .stats-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }

            .client-stats-banner .stat-number {
                font-size: 2rem;
            }
        }

        @media (max-width: 480px) {
            .main-heading {
                font-size: 2.2rem;
            }

            .tagline-highlight {
                font-size: 1.2rem;
            }

            .tagline {
                font-size: 1rem;
            }

            .feature-btn {
                padding: 1.25rem;
            }

            .feature-card {
                min-width: 250px;
                padding: 1.5rem;
            }

            .client-stats-banner .stats-container {
                grid-template-columns: 1fr;
            }

            .client-card {
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <a href="{{ url('/') }}" class="logo-container">
            <img src="{{ asset('uploads/logo/white_logo.png') }}" alt="NEXORA Logo">
            <span class="logo-text">NEXORA</span>
        </a>

        <button class="mobile-menu-btn" id="mobileMenuBtn">
            <i class="fas fa-bars"></i>
        </button>

        <div class="nav-links">
            <a href="{{ url('/') }}" class="nav-link active">Home</a>
            <a href="{{ route('pricing') }}" class="nav-link">Pricing</a>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <div class="mobile-nav-links">
            <a href="{{ url('/') }}" class="mobile-nav-link">Home</a>
            <a href="{{ route('pricing') }}" class="mobile-nav-link">Pricing</a>
        </div>
    </div>

    <!-- WhatsApp Float Button -->
    <a href="https://wa.me/94768971213" class="whatsapp-float" target="_blank" title="Contact on WhatsApp">
        <i class="fab fa-whatsapp"></i>
        <span class="whatsapp-float-text">Get Quote on WhatsApp</span>
    </a>

    <!-- Background Animation -->
    <div class="background-animation" id="particles"></div>
    <div class="grid-overlay"></div>

    <!-- Main Content -->
    <div class="main-container" id="home">
        <section class="hero-section">
            <div class="left-section">
                <div class="logo-badge">
                    <i class="fas fa-graduation-cap"></i>
                    <span>COMPLETE EDUCATION SOLUTION</span>
                </div>

                <h1 class="main-heading">
                    Welcome to <span style="color: var(--accent-green);">NEXORA</span>
                </h1>

                <div class="tagline-highlight">
                    <i class="fas fa-rocket"></i>
                    Bringing You Next
                </div>

                <p class="tagline">
                    Revolutionizing education management with cutting-edge technology.
                    From student enrollment to teacher payroll, we provide a complete
                    ecosystem for modern educational institutions.
                </p>

                <!-- Features Grid -->
                <div class="features-grid">
                    <a href="#" class="feature-btn">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h4 class="feature-title">Mobile App</h4>
                        <p class="feature-desc">Student payments, attendance & learning</p>
                        <span class="status-badge available">
                            <i class="fas fa-check-circle"></i> Available
                        </span>
                    </a>

                    <a href="#" class="feature-btn">
                        <div class="feature-icon">
                            <i class="fas fa-desktop"></i>
                        </div>
                        <h4 class="feature-title">Web Platform</h4>
                        <p class="feature-desc">Institute management & administration</p>
                        <span class="status-badge available">
                            <i class="fas fa-check-circle"></i> Available
                        </span>
                    </a>

                    <a href="{{ route('pricing') }}" class="feature-btn">
                        <div class="feature-icon">
                            <i class="fas fa-tags"></i>
                        </div>
                        <h4 class="feature-title">Flexible Pricing</h4>
                        <p class="feature-desc">Affordable plans for all institutions</p>
                        <span class="status-badge available">
                            <i class="fas fa-check-circle"></i> View Plans
                        </span>
                    </a>
                </div>

                <!-- Login Button -->
                <div class="cta-buttons" style="margin-top: 2rem;">
                    <a href="{{ route('login') }}" class="btn btn-primary">
                        <i class="fas fa-sign-in-alt"></i> ACCESS LOGIN PORTAL
                    </a>
                    <p style="margin-top: 0.75rem; font-size: 0.85rem; color: #94a3b8; text-align: center;">
                        <i class="fas fa-info-circle" style="color: var(--accent-green); margin-right: 0.25rem;"></i>
                        Demo: <code
                            style="background: rgba(255, 255, 255, 0.1); padding: 0.15rem 0.5rem; border-radius: 4px; margin: 0 0.25rem;">admin@nexora.com</code>
                        |
                        <code
                            style="background: rgba(255, 255, 255, 0.1); padding: 0.15rem 0.5rem; border-radius: 4px; margin-left: 0.25rem;">nexora</code>
                    </p>
                </div>
            </div>

            <div class="right-section">
                <div class="logo-container-main">
                    <div class="logo-glow"></div>
                    <img src="{{ asset('uploads/logo/white_logo.png') }}" alt="NEXORA Education System" class="logo">
                </div>

                <!-- Video Demo Section -->
                <div class="video-demo-container">
                    <h3 style="color: var(--accent-green); margin-bottom: 1rem; font-size: 1.2rem;">
                        <i class="fas fa-play-circle"></i> System Demo Video
                    </h3>

                    <div class="video-wrapper" id="videoWrapper">
                        <video id="systemDemoVideo" controls preload="metadata"
                            style="width: 100%; height: auto; display: block;">
                            <source src="{{ asset('uploads/videos/system.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>

                        <div class="video-overlay" id="videoOverlay">
                            <div class="play-button-container">
                                <div class="play-button">
                                    <i class="fas fa-play"></i>
                                </div>
                                <p style="color: white; font-weight: 600;">Watch System Demo</p>
                                <p style="color: #cbd5e1; font-size: 0.9rem;">(13 minutes)</p>
                            </div>
                        </div>
                    </div>

                    <p style="color: #94a3b8; font-size: 0.85rem; margin-top: 0.75rem;">
                        <i class="fas fa-info-circle" style="color: var(--accent-green);"></i>
                        See how our system works in 13 minutes
                    </p>
                </div>

                <div class="stats-container">
                    <div class="stat">
                        <div class="stat-number" id="studentsCount">0</div>
                        <div class="stat-label">Active Students</div>
                    </div>

                    <div class="stat">
                        <div class="stat-number" id="teachersCount">0</div>
                        <div class="stat-label">Teachers</div>
                    </div>

                    <div class="stat">
                        <div class="stat-number" id="successRate">0%</div>
                        <div class="stat-label">Success Rate</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- System Features Scroller -->
        <section class="features-section">
            <h2 class="section-title">Our Comprehensive System Features</h2>
            <div class="features-scroller">
                <div class="features-track" id="featuresTrack">
                    <!-- Feature cards will be generated by JavaScript -->
                </div>
            </div>
        </section>

        <!-- Platform Comparison -->
        <section class="features-section" style="background: rgba(255, 255, 255, 0.02);">
            <h2 class="section-title">Dual Platform Solution</h2>
            <div class="platform-comparison">
                <div class="platform-card">
                    <div class="platform-header">
                        <div class="platform-icon-large">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div>
                            <h3 class="platform-name">Mobile App</h3>
                            <p class="platform-tagline">For Students & Parents</p>
                        </div>
                    </div>
                    <ul class="feature-card-list">
                        <li><i class="fas fa-check"></i> Student Payment Processing</li>
                        <li><i class="fas fa-check"></i> Attendance Marking System</li>
                        <li><i class="fas fa-check"></i> Progress Tracking Dashboard</li>
                        <li><i class="fas fa-check"></i> Exam Results & Timetable</li>
                        <li><i class="fas fa-check"></i> Push Notifications</li>
                    </ul>
                    <a href="#" class="btn btn-primary" style="width: 100%; margin-top: 1.5rem;">
                        <i class="fas fa-external-link-alt"></i> Explore Mobile App
                    </a>
                </div>

                <div class="platform-card">
                    <div class="platform-header">
                        <div class="platform-icon-large">
                            <i class="fas fa-desktop"></i>
                        </div>
                        <div>
                            <h3 class="platform-name">Web Platform</h3>
                            <p class="platform-tagline">For Institutes & Administrators</p>
                        </div>
                    </div>
                    <ul class="feature-card-list">
                        <li><i class="fas fa-check"></i> Teacher Salary Management</li>
                        <li><i class="fas fa-check"></i> Institute Financial Tracking</li>
                        <li><i class="fas fa-check"></i> Student Enrollment System</li>
                        <li><i class="fas fa-check"></i> Advanced Analytics & Reports</li>
                        <li><i class="fas fa-check"></i> Bulk Operations</li>
                    </ul>
                    <a href="#" class="btn btn-primary" style="width: 100%; margin-top: 1.5rem;">
                        <i class="fas fa-external-link-alt"></i> Explore Web Platform
                    </a>
                </div>
            </div>
        </section>

        <!-- Our Clients Section -->
        <section class="clients-section">
            <h2 class="section-title">Trusted by Leading Institutions</h2>
            <p class="section-subtitle"
                style="text-align: center; color: #94a3b8; margin-bottom: 3rem; max-width: 800px; margin-left: auto; margin-right: auto;">
                We partner with top educational institutions across Sri Lanka to transform their management systems
            </p>

            <div class="clients-grid">
                <!-- Client 1 -->
                <div class="client-card">
                    <div class="client-logo">
                        <i class="fas fa-school"></i>
                    </div>
                    <h3 class="client-name">Success Academy</h3>
                    <p class="client-location">Padavi Parakramapura</p>
                    <div class="client-stats">
                        <div class="client-stat">
                            <span class="stat-number">1,250+</span>
                            <span class="stat-label">Students</span>
                        </div>
                        <div class="client-stat">
                            <span class="stat-number">20+</span>
                            <span class="stat-label">Teachers</span>
                        </div>
                    </div>
                    <div class="client-testimonial">
                        <i class="fas fa-quote-left"></i>
                        <p>"NEXORA revolutionized our fee management system"</p>
                    </div>
                </div>

                <!-- Client 2 -->
                <div class="client-card">
                    <div class="client-logo">
                        <i class="fas fa-university"></i>
                    </div>
                    <h3 class="client-name">Savidya Education Institute</h3>
                    <p class="client-location">Mirigama</p>
                    <div class="client-stats">
                        <div class="client-stat">
                            <span class="stat-number">1020+</span>
                            <span class="stat-label">Students</span>
                        </div>
                        <div class="client-stat">
                            <span class="stat-number">20+</span>
                            <span class="stat-label">Teachers</span>
                        </div>
                    </div>
                    <div class="client-testimonial">
                        <i class="fas fa-quote-left"></i>
                        <p>"Attendance tracking became 90% faster"</p>
                    </div>
                </div>

                <!-- Client 3 -->
                <div class="client-card">
                    <div class="client-logo">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3 class="client-name">CO-OP Education Institute</h3>
                    <p class="client-location">Padavi Parakramapura</p>
                    <div class="client-stats">
                        <div class="client-stat">
                            <span class="stat-number">850+</span>
                            <span class="stat-label">Students</span>
                        </div>
                        <div class="client-stat">
                            <span class="stat-number">10+</span>
                            <span class="stat-label">Teachers</span>
                        </div>
                    </div>
                    <div class="client-testimonial">
                        <i class="fas fa-quote-left"></i>
                        <p>"Teacher payroll processing is now automated"</p>
                    </div>
                </div>
            </div>

            <!-- Client Statistics Banner -->
            <div class="client-stats-banner">
                <div class="stats-container">
                    <div class="stat-item">
                        <div class="stat-number">20+</div>
                        <div class="stat-label">Educational Institutions</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">25,000+</div>
                        <div class="stat-label">Students Managed</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">1,500+</div>
                        <div class="stat-label">Teachers Supported</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">99%</div>
                        <div class="stat-label">Client Satisfaction</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Feedback Section -->
        <section class="feedback-section" id="feedback">
            <h2 class="section-title">What Our Users Say</h2>
            <div class="feedback-grid">
                <div class="feedback-card">
                    <div class="feedback-header">
                        <div class="feedback-avatar">SR</div>
                        <div class="feedback-info">
                            <h4>Sandun Rajapakse</h4>
                            <p class="feedback-role">Institute Director</p>
                        </div>
                    </div>
                    <p class="feedback-text">
                        "NEXORA transformed our institute's management. The payment tracking and
                        teacher salary system saved us countless hours of manual work."
                    </p>
                    <div class="feedback-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="feedback-card">
                    <div class="feedback-header">
                        <div class="feedback-avatar">MI</div>
                        <div class="feedback-info">
                            <h4>Madushani Iroshani</h4>
                            <p class="feedback-role">Senior Teacher</p>
                        </div>
                    </div>
                    <p class="feedback-text">
                        "The mobile app makes attendance marking so easy. I can track student
                        progress and communicate with parents seamlessly."
                    </p>
                    <div class="feedback-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="feedback-card">
                    <div class="feedback-header">
                        <div class="feedback-avatar">KR</div>
                        <div class="feedback-info">
                            <h4>Kavindu Ranasinghe</h4>
                            <p class="feedback-role">Student</p>
                        </div>
                    </div>
                    <p class="feedback-text">
                        "Paying fees through the app is super convenient. I can also access
                        study materials and check my attendance anytime."
                    </p>
                    <div class="feedback-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </section>

        <!-- Final CTA Section -->
        <section class="cta-section">
            <h2 class="cta-title">Ready to Transform Your Institute?</h2>
            <p class="cta-text">
                Join hundreds of educational institutions already using NEXORA to streamline
                their operations, improve efficiency, and enhance the learning experience.
            </p>

            <div class="cta-buttons">
                <a href="{{ route('login') }}" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt"></i> ACCESS LOGIN PORTAL
                </a>
                <a href="{{ route('pricing') }}" class="btn btn-secondary">
                    <i class="fas fa-tags"></i> View Pricing
                </a>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer">
            <div class="footer-links">
                <a href="{{ url('/') }}" class="footer-link">Home</a>
                <a href="{{ route('pricing') }}" class="footer-link">Pricing</a>
                <a href="{{ route('login') }}" class="footer-link">Login</a>
            </div>
            <p>&copy; 2024 NEXORA Education System. All rights reserved.</p>
            <p style="margin-top: 1rem; font-size: 0.9rem;">
                <i class="fas fa-map-marker-alt"></i> Mirigama, Sri Lanka |
                <i class="fas fa-phone"></i> +94 76 897 12 13 |
                <i class="fas fa-envelope"></i> info@nexora.edu.lk
            </p>
            <p style="margin-top: 0.5rem; font-size: 0.8rem; color: #64748b;">
                "Bringing You Next" in Education Technology
            </p>
        </footer>
    </div>

    <script>
        // Create background particles
        function createParticles() {
            const container = document.getElementById('particles');
            const colors = ['rgba(59, 130, 246, 0.1)', 'rgba(16, 185, 129, 0.1)', 'rgba(139, 92, 246, 0.1)'];

            for (let i = 0; i < 20; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');

                const size = Math.random() * 100 + 20;
                const color = colors[Math.floor(Math.random() * colors.length)];
                const left = Math.random() * 100;
                const top = Math.random() * 100;
                const delay = Math.random() * 15;

                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.background = color;
                particle.style.left = `${left}%`;
                particle.style.top = `${top}%`;
                particle.style.animationDelay = `${delay}s`;

                container.appendChild(particle);
            }
        }

        // Animated statistics
        function animateStatistics() {
            const studentsCount = document.getElementById('studentsCount');
            const teachersCount = document.getElementById('teachersCount');
            const successRate = document.getElementById('successRate');

            // Animate students count
            let students = 0;
            const studentsTarget = 25000;
            const studentsInterval = setInterval(() => {
                students += Math.ceil(studentsTarget / 100);
                if (students >= studentsTarget) {
                    students = studentsTarget;
                    clearInterval(studentsInterval);
                }
                studentsCount.textContent = students.toLocaleString();
            }, 20);

            // Animate teachers count
            let teachers = 0;
            const teachersTarget = 1500;
            const teachersInterval = setInterval(() => {
                teachers += Math.ceil(teachersTarget / 100);
                if (teachers >= teachersTarget) {
                    teachers = teachersTarget;
                    clearInterval(teachersInterval);
                }
                teachersCount.textContent = teachers.toLocaleString();
            }, 30);

            // Animate success rate
            let rate = 0;
            const rateTarget = 100;
            const rateInterval = setInterval(() => {
                rate += Math.ceil(rateTarget / 100);
                if (rate >= rateTarget) {
                    rate = rateTarget;
                    clearInterval(rateInterval);
                }
                successRate.textContent = `${rate}%`;
            }, 40);
        }

        // System features data - Your actual system features
        const systemFeatures = [
            {
                icon: 'fas fa-user-graduate',
                title: 'Student Management',
                desc: 'Complete student lifecycle management',
                features: ['Enrollment System', 'Student Profiles', 'Progress Tracking', 'Attendance Records']
            },
            {
                icon: 'fas fa-chalkboard-teacher',
                title: 'Teacher Management',
                desc: 'Efficient teacher administration',
                features: ['Salary Processing', 'Class Allocation', 'Performance Tracking', 'Payment History']
            },
            {
                icon: 'fas fa-money-check-alt',
                title: 'Payment System',
                desc: 'Comprehensive financial management',
                features: ['Student Fees', 'Teacher Salaries', 'Expense Tracking', 'Financial Reports']
            },
            {
                icon: 'fas fa-calendar-check',
                title: 'Attendance System',
                desc: 'Automated attendance tracking',
                features: ['Daily Attendance', 'Class-wise Reports', 'Parent Notifications', 'Analytics']
            },
            {
                icon: 'fas fa-chart-bar',
                title: 'Analytics & Reports',
                desc: 'Data-driven insights',
                features: ['Performance Analytics', 'Financial Reports', 'Attendance Reports', 'Custom Dashboards']
            },
            {
                icon: 'fas fa-id-card',
                title: 'ID Card Generation',
                desc: 'Professional student ID cards',
                features: ['Automatic Generation', 'Bulk Printing', 'Custom Designs', 'QR Code Integration']
            },
            {
                icon: 'fas fa-file-invoice-dollar',
                title: 'Receipt Management',
                desc: 'Automated receipt system',
                features: ['Digital Receipts', 'Print Options', 'Payment History', 'Tax Compliance']
            },
            {
                icon: 'fas fa-building',
                title: 'Institute Management',
                desc: 'Multi-branch administration',
                features: ['Branch Management', 'User Roles', 'System Settings', 'Backup & Security']
            },
            {
                icon: 'fas fa-envelope',
                title: 'Communication',
                desc: 'Seamless communication tools',
                features: ['Email Integration', 'Push Notifications', 'Announcements', 'Parent Communication']
            },
            {
                icon: 'fas fa-mobile-alt',
                title: 'Mobile Access',
                desc: 'On-the-go management',
                features: ['Android App', 'Mobile Payments', 'Real-time Updates']
            }
        ];

        // Generate system features scroller
        function generateFeaturesScroller() {
            const track = document.getElementById('featuresTrack');

            // Duplicate features for infinite scroll effect
            const allFeatures = [...systemFeatures, ...systemFeatures, ...systemFeatures];

            allFeatures.forEach(feature => {
                const card = document.createElement('div');
                card.className = 'feature-card';
                card.innerHTML = `
                    <div class="feature-card-icon">
                        <i class="${feature.icon}"></i>
                    </div>
                    <h3 class="feature-card-title">${feature.title}</h3>
                    <p class="feature-card-desc">${feature.desc}</p>
                    <ul class="feature-card-list">
                        ${feature.features.map(f => `<li><i class="fas fa-check"></i> ${f}</li>`).join('')}
                    </ul>
                `;
                track.appendChild(card);
            });
        }

        // Video player functionality
        function setupVideoPlayer() {
            const video = document.getElementById('systemDemoVideo');
            const overlay = document.getElementById('videoOverlay');
            const videoWrapper = document.getElementById('videoWrapper');

            // Ensure video loads properly
            video.addEventListener('loadeddata', function () {
                console.log('Video loaded successfully');
            });

            video.addEventListener('error', function (e) {
                console.error('Video error:', e);
                console.log('Video source:', video.querySelector('source').src);

                // Fallback to direct URL if asset() fails
                if (video.querySelector('source').src.includes('asset')) {
                    const videoElement = document.getElementById('systemDemoVideo');
                    const sourceElement = videoElement.querySelector('source');
                    sourceElement.src = '/uploads/videos/system.mp4';
                    videoElement.load();
                }
            });

            // Play video when overlay is clicked
            overlay.addEventListener('click', function () {
                video.play().catch(function (error) {
                    console.error('Error playing video:', error);
                });
                overlay.classList.add('hidden');
            });

            // Show overlay when video ends
            video.addEventListener('ended', function () {
                overlay.classList.remove('hidden');
            });

            // Show overlay when video is paused
            video.addEventListener('pause', function () {
                if (!video.ended) {
                    overlay.classList.remove('hidden');
                }
            });

            // Hide overlay when video is playing
            video.addEventListener('play', function () {
                overlay.classList.add('hidden');
            });

            // Touch/click on video wrapper to play
            videoWrapper.addEventListener('click', function (e) {
                if (e.target === videoWrapper || e.target === overlay) {
                    video.play().catch(function (error) {
                        console.error('Error playing video:', error);
                    });
                }
            });
        }

        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('active');
            mobileMenuBtn.innerHTML = mobileMenu.classList.contains('active')
                ? '<i class="fas fa-times"></i>'
                : '<i class="fas fa-bars"></i>';
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!mobileMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                mobileMenu.classList.remove('active');
                mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                if (this.getAttribute('href').startsWith('#') && this.getAttribute('href') !== '#') {
                    e.preventDefault();

                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);

                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });

        // Initialize everything when page loads
        document.addEventListener('DOMContentLoaded', function () {
            createParticles();
            animateStatistics();
            generateFeaturesScroller();
            setupVideoPlayer();

            // Update nav link active state
            const currentPath = window.location.pathname;
            document.querySelectorAll('.nav-link').forEach(link => {
                if (link.getAttribute('href') === currentPath ||
                    (currentPath === '/' && link.getAttribute('href') === '{{ url("/") }}')) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
        });
    </script>
</body>

</html>