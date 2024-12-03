USE tienda_galletas_pan;

CREATE TABLE ventas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto VARCHAR(100),
    cantidad INT,
    precio DECIMAL(10, 2),
    total DECIMAL(10, 2),
    cliente VARCHAR(100),
    fecha DATE
);
