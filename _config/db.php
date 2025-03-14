<?php
require __DIR__ . '/../vendor/autoload.php'; // Load Composer Autoload

use Dotenv\Dotenv;

// Load `.env`
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Konfigurasi database dari .env
$host = $_ENV['DB_HOST'];
$port = $_ENV['DB_PORT']; // Default PostgreSQL: 5432
$dbname = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];

try {
    // Buat koneksi PDO
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Aktifkan error mode exception
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Default fetch mode
    ]);

    echo "✅ Koneksi PostgreSQL berhasil!";
} catch (PDOException $e) {
    die("❌ Koneksi gagal: " . $e->getMessage());
}
?>