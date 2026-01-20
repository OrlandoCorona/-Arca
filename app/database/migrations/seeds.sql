-- El Arca Database Seeds
-- Phase 1: Inventory & Config

-- 1. Insert Areas (Fixed Inventory)
-- Principal: 27 mesas
-- Hamacas: 10
-- Carpas: 12
-- Niños: 8
-- Billar: 7
-- Salón: 12
-- Salita: 1

INSERT INTO areas (name_es, name_en) VALUES 
('Principal', 'Main Area'),
('Hamacas', 'Hammocks'),
('Carpas', 'Tents'),
('Niños', 'Kids Zone'),
('Billar', 'Billiards'),
('Salón', 'Lounge'),
('Salita', 'Small Lounge')
ON CONFLICT (name_es) DO NOTHING;

-- 2. Insert Tables (Generating based on counts)
-- We use a DO block to generate the tables dynamically based on the inventory counts.

DO $$
DECLARE
    area_rec RECORD;
    i INTEGER;
    limit_count INTEGER;
BEGIN
    FOR area_rec IN SELECT * FROM areas LOOP
        -- Determined count based on name
        CASE area_rec.name_es
            WHEN 'Principal' THEN limit_count := 27;
            WHEN 'Hamacas' THEN limit_count := 10;
            WHEN 'Carpas' THEN limit_count := 12;
            WHEN 'Niños' THEN limit_count := 8;
            WHEN 'Billar' THEN limit_count := 7;
            WHEN 'Salón' THEN limit_count := 12;
            WHEN 'Salita' THEN limit_count := 1;
            ELSE limit_count := 0;
        END CASE;

        FOR i IN 1..limit_count LOOP
            INSERT INTO tables (area_id, table_number, capacity)
            VALUES (area_rec.id, area_rec.name_es || '-' || i, 4) -- Default capacity 4, flexible
            ON CONFLICT DO NOTHING;
        END LOOP;
    END LOOP;
END $$;

-- 3. Insert Config (Business Rules)
-- Hours: 12:00 -> 19:00
INSERT INTO config (key, value) VALUES 
('operating_hours', '{"open": "12:00", "close": "19:00"}'::jsonb),
('reservation_rules', '{"block_all_day": true, "allow_same_day": true}'::jsonb)
ON CONFLICT (key) DO UPDATE SET value = EXCLUDED.value;

-- 4. Sample Products (Just structure verification, not full migration yet)
INSERT INTO products (category, name, image_path, price, position) VALUES
('micheladas_grandes_clasicas,', 'Michelada Grande', 'michelada-grande.jpg', 85.00, 1),
('tacos_de_asada', 'Orden de Tacos', 'orden-tacos.jpg', 120.00, 2)
ON CONFLICT DO NOTHING;
