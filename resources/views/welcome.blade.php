<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mebelin API Service - Payment Gateway & Shipping</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            color: white;
            margin-bottom: 40px;
            animation: fadeInDown 1s ease-out;
        }

        .header h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            background: linear-gradient(45deg, #fff, #f0f8ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .header .subtitle {
            font-size: 1.3rem;
            opacity: 0.9;
            font-weight: 300;
        }

        .main-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
            animation: fadeInUp 1s ease-out 0.3s both;
        }

        .services-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 40px;
        }

        .service-card {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            border-radius: 15px;
            padding: 30px;
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(79, 172, 254, 0.4);
        }

        .service-card.coming-soon {
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            position: relative;
        }

        .service-card.coming-soon::after {
            content: "COMING SOON";
            position: absolute;
            top: 15px;
            right: -30px;
            background: #ff6b6b;
            color: white;
            padding: 5px 40px;
            font-size: 0.8rem;
            font-weight: bold;
            transform: rotate(45deg);
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }

        .service-icon {
            font-size: 3rem;
            margin-bottom: 15px;
            display: block;
        }

        .service-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .service-desc {
            opacity: 0.9;
            line-height: 1.6;
        }

        .endpoint-section {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            border-left: 5px solid #4facfe;
        }

        .endpoint-title {
            color: #2c3e50;
            font-size: 1.8rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .method-badge {
            background: #28a745;
            color: white;
            padding: 8px 15px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
        }

        .endpoint-url {
            background: #2c3e50;
            color: #4facfe;
            padding: 15px 20px;
            border-radius: 10px;
            font-family: 'Courier New', monospace;
            font-size: 1.1rem;
            margin: 15px 0;
            word-break: break-all;
            border: 2px solid #4facfe;
        }

        .json-example {
            background: #1e1e1e;
            color: #f8f8f2;
            padding: 25px;
            border-radius: 10px;
            font-family: 'Courier New', monospace;
            font-size: 0.9rem;
            line-height: 1.6;
            overflow-x: auto;
            margin-top: 20px;
            border: 1px solid #444;
        }

        .json-title {
            color: #2c3e50;
            font-size: 1.3rem;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .highlight {
            color: #66d9ef;
        }
        
        .string {
            color: #a6e22e;
        }
        
        .number {
            color: #fd971f;
        }

        .footer {
            text-align: center;
            color: white;
            margin-top: 50px;
            opacity: 0.8;
            animation: fadeIn 1s ease-out 1s both;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 2.5rem;
            }
            
            .services-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .main-card {
                padding: 25px;
            }
            
            .container {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🏠 MEBELIN API SERVICE</h1>
            <p class="subtitle">Payment Gateway & Shipping </p>
        </div>

        <div class="main-card">
            <div class="services-grid">
                <div class="service-card">
                    <span class="service-icon">💳</span>
                    <h3 class="service-title">Payment Gateway</h3>
                    <p class="service-desc">Solusi pembayaran terintegrasi dengan berbagai metode pembayaran untuk transaksi furniture Anda</p>
                </div>
                
                <div class="service-card coming-soon">
                    <span class="service-icon">🚚</span>
                    <h3 class="service-title">Shipping Service</h3>
                    <p class="service-desc">Layanan pengiriman khusus furniture dengan tracking real-time dan asuransi produk</p>
                </div>
            </div>

            <div class="endpoint-section">
                <h2 class="endpoint-title">
                    <span class="method-badge">POST</span>
                    Payment Gateway Endpoint
                </h2>
                <div class="endpoint-url">
                    /api/payment-gateway/store
                </div>
                <p style="color: #666; margin-top: 15px; line-height: 1.6;">
                    Endpoint ini digunakan untuk memproses transaksi pembayaran untuk semua jenis toko online. Kirimkan data toko, customer, dan produk untuk mendapatkan link pembayaran yang aman dan terpercaya.
                </p>
                
                <div style="background: #fff3cd; border: 1px solid #ffeaa7; border-radius: 10px; padding: 20px; margin-top: 20px;">
                    <h4 style="color: #856404; margin-bottom: 15px; font-size: 1.1rem;">📝 Parameter Yang Diperlukan:</h4>
                    <div style="color: #856404; line-height: 1.8;">
                        <div style="margin-bottom: 12px;"><strong>store_name</strong> - Nama toko merchant (string, wajib)</div>
                        <div style="margin-bottom: 12px;"><strong>customer_name</strong> - Nama lengkap pembeli (string, wajib)</div>
                        <div style="margin-bottom: 12px;"><strong>customer_email</strong> - Email pembeli untuk notifikasi (string, wajib)</div>
                        <div style="margin-bottom: 12px;"><strong>customer_phone</strong> - Nomor telepon pembeli (string, wajib)</div>
                        <div style="margin-bottom: 12px;"><strong>products</strong> - Array produk yang dibeli dengan detail:</div>
                        <div style="margin-left: 20px; margin-bottom: 12px;">
                            • <strong>product_code</strong> - Kode unik produk<br>
                            • <strong>product_name</strong> - Nama produk<br>
                            • <strong>product_price</strong> - Harga satuan (integer)<br>
                            • <strong>quantity</strong> - Jumlah yang dibeli (integer)
                        </div>
                        <div style="margin-bottom: 12px;"><strong>callback_url</strong> - URL untuk notifikasi status pembayaran (string, wajib)</div>
                        <div style="margin-bottom: 5px;"><strong>metode_pembayaran</strong> - Metode pembayaran yang dipilih (QRIS, Bank Transfer, E-Wallet, dll)</div>
                    </div>
                </div>
            </div>

            <div class="json-title">📋 Contoh Request JSON:</div>
            <div class="json-example">
{
  <span class="highlight">"store_name"</span>: <span class="string">"Toko Mebel Jaya"</span>,
  <span class="highlight">"customer_name"</span>: <span class="string">"Budi Santoso"</span>,
  <span class="highlight">"customer_email"</span>: <span class="string">"budi@example.com"</span>,
  <span class="highlight">"customer_phone"</span>: <span class="string">"081234567890"</span>,
  <span class="highlight">"products"</span>: [
    {
      <span class="highlight">"product_code"</span>: <span class="string">"MBL001"</span>,
      <span class="highlight">"product_name"</span>: <span class="string">"Meja Kayu Jati"</span>,
      <span class="highlight">"product_price"</span>: <span class="number">2500000</span>,
      <span class="highlight">"quantity"</span>: <span class="number">1</span>
    },
    {
      <span class="highlight">"product_code"</span>: <span class="string">"MBL002"</span>,
      <span class="highlight">"product_name"</span>: <span class="string">"Kursi Tamu Minimalis"</span>,
      <span class="highlight">"product_price"</span>: <span class="number">1800000</span>,
      <span class="highlight">"quantity"</span>: <span class="number">1</span>
    }
  ],
  <span class="highlight">"callback_url"</span>: <span class="string">"https://tokomebeljaya.com/payment-callback"</span>,
  <span class="highlight">"metode_pembayaran"</span>: <span class="string">"QRIS"</span>
}
            </div>
        </div>

        <div class="footer">
            <p>© 2025 Mebelin API Service - Powered by Innovation in Furniture Technology</p>
        </div>
    </div>
</body>
</html>