<?php

class SQL
{
    public false|mysqli_result $result;
    public null|string $error = null;
    private string $servername;
    private string $username;
    private string $password;
    private string $dbname;
    private mysqli $conn;

    public function __construct($servername, $username, $password, $dbname)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
        try {
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            if ($this->conn->connect_error) {
                die("Kết nối thất bại: " . $this->conn->connect_error . "\n");
            }
            mysqli_set_charset($this->conn, 'utf8');
        } catch (Throwable $th) {
            die("Lỗi kết nối CSDL: " . $th->getMessage() . "\n");
        }
    }

    public function query($sql, array $params = []): false|mysqli_result
    {
        if (empty($sql)) {
            echo "Query is empty";
            return false;
        }

        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            $this->error = $this->conn->error;
            return false;
        }
        $type_params = "";
        foreach ($params as $param) {
            if (is_int($param)) {
                $type_params .= "i";
            } else if (is_float($param)) {
                $type_params .= "d";
            } else {
                $type_params .= "s";
            }
        }
        if (!empty($type_params)) {
            $stmt->bind_param($type_params, ...$params);
        }
        $process = $stmt->execute();

        if (!$process) {
            $this->error = $this->conn->error;
            return false;
        }
        $this->result = $stmt->get_result();
        return $this->result;
    }

    public function fetch_once(): false|array|null
    {
        return $this->result->fetch_assoc();
    }

    public function fetch_all(): array
    {
        return $this->result->fetch_all(MYSQLI_ASSOC);
    }

    public function affected_rows(): int
    {
        return $this->conn->affected_rows;
    }

    public function insertId(): int
    {
        return $this->conn->insert_id;
    }

    public function error(): string|null
    {
        return $this->error;
    }

    public function close(): void
    {
        $this->conn->close();
    }

    public function __destruct()
    {
        $this->close();
    }
}
