<?php
class BaseBD {
    private $host = "127.0.0.1";
    private $user = "root";
    private $pass = "";
    private $db   = "worshop3";
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($this->conn->connect_errno) {
            die("Error al conectar: " . $this->conn->connect_error);
        }
        $this->conn->set_charset("utf8mb4");
    }

    public function getConexion() {
        return $this->conn;
    }

    public function cerrar() {
        $this->conn->close();
    }
}

class Usuario {
    public function __construct(
        public string $nombre,
        public string $apellidos,
        public string $username,
        public string $provincia
    ) {}

    public function esValido(): bool {
        return $this->nombre !== "" && $this->apellidos !== "" && $this->username !== "" && $this->provincia !== "";
    }
}

class UsuarioBD {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function guardar(Usuario $usuario): bool {
        $stmt = $this->conn->prepare("INSERT INTO usuarios (nombre, apellidos, username, provincia) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $usuario->nombre, $usuario->apellidos, $usuario->username, $usuario->provincia);
        return $stmt->execute();
    }

    public function obtenerProvincias(): array {
        $sql = "SELECT nombre FROM provincias ORDER BY nombre ASC";
        $rs = $this->conn->query($sql);
        $lista = [];
        if ($rs && $rs->num_rows > 0) {
            while ($row = $rs->fetch_assoc()) {
                $lista[] = $row['nombre'];
            }
        }
        return $lista;
    }
}
?>


