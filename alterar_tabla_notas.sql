ALTER TABLE notas
ALTER COLUMN valor_nota TYPE numeric,
ALTER COLUMN ponderacion TYPE numeric;
CREATE EXTENSION IF NOT EXISTS tablefunc;