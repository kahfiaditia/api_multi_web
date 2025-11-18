@extends('legal.struktur.awal')
@section('hukum')

<style>
        /* Additional Styles for About Page */
        .about-hero {
            background: linear-gradient(135deg, #1a237e 0%, #283593 100%);
            color: white;
            padding: 100px 0 80px;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            border-left: 4px solid #1a237e;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            color: #1a237e;
            margin-bottom: 10px;
        }

        .value-card {
            background: white;
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            height: 100%;
        }

        .value-card:hover {
            transform: translateY(-5px);
        }

        .value-icon {
            width: 70px;
            height: 70px;
            background: #e8eaf6;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .value-icon i {
            font-size: 30px;
            color: #1a237e;
        }

        .timeline {
            position: relative;
            padding: 40px 0;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #1a237e;
            transform: translateX(-50%);
        }

        .timeline-item {
            margin-bottom: 50px;
            position: relative;
        }

        .timeline-content {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            position: relative;
            width: 45%;
        }

        .timeline-item:nth-child(odd) .timeline-content {
            margin-left: auto;
        }

        .timeline-item:nth-child(even) .timeline-content {
            margin-right: auto;
        }

        .timeline-dot {
            position: absolute;
            left: 50%;
            top: 30px;
            width: 20px;
            height: 20px;
            background: #1a237e;
            border-radius: 50%;
            transform: translateX(-50%);
            border: 4px solid white;
            box-shadow: 0 0 0 3px #1a237e;
        }

        .partner-logo {
            background: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .partner-logo:hover {
            transform: translateY(-5px);
        }

        .partner-logo img {
            max-height: 60px;
            width: auto;
            filter: grayscale(100%);
            transition: filter 0.3s ease;
        }

        .partner-logo:hover img {
            filter: grayscale(0%);
        }

        @media (max-width: 768px) {
            .timeline::before {
                left: 30px;
            }

            .timeline-content {
                width: calc(100% - 80px);
                margin-left: 80px !important;
            }

            .timeline-dot {
                left: 30px;
            }
        }
    </style>
    
            @include('legal.pecahan.bannertentang')
            @include('legal.pecahan.tagline')
            @include('legal.pecahan.visimisi')
            @include('legal.pecahan.nilai')
            @include('legal.pecahan.sejarah')

@endsection