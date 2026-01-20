-- El Arca Database Schema
-- Phase 1: Core Structure

-- Enable UUID extension if needed (optional, keeping it simple with SERIAL/INTEGER for now as per request simplicity unless specified otherwise)
-- CREATE EXTENSION IF NOT EXISTS "uuid-ossp";

-- 1. Areas (Zonas)
CREATE TABLE IF NOT EXISTS areas (
    id SERIAL PRIMARY KEY,
    name_es VARCHAR(50) NOT NULL UNIQUE, -- 'Principal', 'Hamacas', etc.
    name_en VARCHAR(50) NOT NULL, -- 'Main', 'Hammocks', etc.
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 2. Tables (Mesas)
CREATE TABLE IF NOT EXISTS tables (
    id SERIAL PRIMARY KEY,
    area_id INTEGER NOT NULL REFERENCES areas(id) ON DELETE CASCADE,
    table_number VARCHAR(10) NOT NULL, -- Logical number/name, e.g., 'P-1', 'H-1'
    capacity INTEGER DEFAULT 4, -- Default capacity, strictly controlled by inventory rules
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(area_id, table_number)
);

-- 3. Users (Keeping existing structure generally, but ensuring we have what we need for reservations)
-- Assuming a 'users' table exists from the existing 'Auth' system. 
-- If not, we create a minimal one or rely on the existing one. 
-- For this file, I will CREATE it IF NOT EXISTS matching standard expectations.
CREATE TABLE IF NOT EXISTS users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    role VARCHAR(20) DEFAULT 'client', -- 'client', 'admin'
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 4. Reservations (Reservaciones)
CREATE TYPE reservation_status AS ENUM ('pending', 'confirmed', 'cancelled', 'completed');

CREATE TABLE IF NOT EXISTS reservations (
    id SERIAL PRIMARY KEY,
    user_id INTEGER NOT NULL REFERENCES users(id),
    table_id INTEGER NOT NULL REFERENCES tables(id),
    reservation_date DATE NOT NULL,
    guest_count INTEGER NOT NULL CHECK (guest_count > 0),
    status reservation_status DEFAULT 'pending',
    reservation_time TIME, -- Optional metadata (e.g. arrived at 14:00), since "Bloquea TODO el día"
    special_requests TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    -- Constraint: A table can only be booked once per date
    UNIQUE(table_id, reservation_date) 
);

-- 5. Products (Menu)
CREATE TABLE IF NOT EXISTS products (
    id SERIAL PRIMARY KEY,
    category VARCHAR(50) NOT NULL, -- 'micheladas', 'food', etc.
    name VARCHAR(100) NOT NULL,
    description TEXT,
    image_path VARCHAR(255),
    price DECIMAL(10, 2), -- Nullable allowed? User said "products.price (decimal)", implying we should have it.
    position INTEGER DEFAULT 0, -- For sorting
    is_available BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 6. Config (Business Rules: Hours, miscellaneous)
CREATE TABLE IF NOT EXISTS config (
    key VARCHAR(50) PRIMARY KEY,
    value JSONB NOT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 7. Contact Messages
CREATE TABLE IF NOT EXISTS contact_messages (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) NOT NULL,
    subject VARCHAR(150),
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
