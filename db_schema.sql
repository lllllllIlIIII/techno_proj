
-- Création des tables
CREATE TABLE users (
                       id SERIAL PRIMARY KEY,
                       name TEXT NOT NULL,
                       email TEXT UNIQUE NOT NULL,
                       password TEXT NOT NULL,
                       role TEXT NOT NULL CHECK (role IN ('admin', 'user'))
);

CREATE TABLE products (
    id SERIAL PRIMARY KEY,
    name TEXT NOT NULL,
    description TEXT,
    price NUMERIC(10,2) NOT NULL,
    stock INTEGER NOT NULL,
    image TEXT
);

-- Fonction plpgsql pour ajouter un produit
CREATE OR REPLACE FUNCTION ajouter_produit(
    p_name TEXT,
    p_description TEXT,
    p_price NUMERIC,
    p_stock INTEGER,
    p_image TEXT
) RETURNS VOID AS $$
BEGIN
    INSERT INTO products(name, description, price, stock, image)
    VALUES (p_name, p_description, p_price, p_stock, p_image);
END;
$$ LANGUAGE plpgsql;

-- Insertion d'un admin par défaut (mot de passe hashé "admin123")
INSERT INTO users (name, email, password, role) VALUES (
    'Admin', 'admin@example.com',
    '$2y$10$vE9K9z4GH8pZs4t1mEVO2.Z5Mk2Mn7Us8rABw.SW7yuhE8HLzLACa', -- hash bcrypt de "admin123"
    'admin'
);

-- Insertion de produits de démonstration
INSERT INTO products (name, description, price, stock, image) VALUES
('Fusil AK-47', 'Fusil d_assaut automatique.', 899.99, 12, 'images/ak47.jpg'),
('Pistolet Glock 17', 'Pistolet semi-automatique 9mm.', 499.50, 30, 'images/glock17.jpg'),
('Sniper Dragunov', 'Fusil de précision.', 1299.00, 5, 'images/dragunov.jpg'),
('Mitrailleuse M249', 'Arme de soutien automatique.', 2599.90, 3, 'images/m249.jpg'),
('Revolver Colt Python', 'Révolver puissant calibre .357.', 799.00, 8, 'images/coltpython.jpg');
