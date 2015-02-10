CREATE SCHEMA openwines;
SET search_path TO openwines, public;

CREATE TABLE openwines.vignoble (
  id                SERIAL PRIMARY KEY,
  name              VARCHAR(255)        NULL,
  description       TEXT                NULL,
  departments       INT[]               NULL,
  area              INT                 NULL,
  more              TEXT                NULL,
  created_at        TIMESTAMPTZ         NOT NULL,
  updated_at        TIMESTAMPTZ         NOT NULL
);

COMMENT ON COLUMN openwines.vignoble.area IS 'hectares';

INSERT INTO openwines.vignoble (name, description, departments, area, more, created_at, updated_at) VALUES
('Alsace', 'grand terroir', NULL, NULL, 'http://fr.wikipedia.org/wiki/Vignoble_d%27Alsace', '2014-05-30 00:00:00 Europe/Paris', '2014-05-30 00:00:00 Europe/Paris'),
('Beaujolais', 'grand terroir', NULL, NULL, 'http://fr.wikipedia.org/wiki/Vignoble_du_Beaujolais', '2014-05-30 00:00:00 Europe/Paris', '2014-05-30 00:00:00 Europe/Paris'),
('Bordeaux', 'grand terroir', NULL, NULL, 'http://fr.wikipedia.org/wiki/Vignoble_de_Bordeaux', '2014-05-30 00:00:00 Europe/Paris', '2014-05-30 00:00:00 Europe/Paris'),
('Bourgogne', 'grand terroir', NULL, NULL, 'http://fr.wikipedia.org/wiki/Vignoble_de_Bourgogne', '2014-05-30 00:00:00 Europe/Paris', '2014-05-30 00:00:00 Europe/Paris'),
('Champagne', 'grand terroir', NULL, NULL, 'http://fr.wikipedia.org/wiki/Vignoble_de_Champagne', '2014-05-30 00:00:00 Europe/Paris', '2014-05-30 00:00:00 Europe/Paris'),
('Corse', 'grand terroir', NULL, NULL, 'http://fr.wikipedia.org/wiki/Vignoble_de_Corse', '2014-05-30 00:00:00 Europe/Paris', '2014-05-30 00:00:00 Europe/Paris'),
('Jura', 'grand terroir', NULL, NULL, 'http://fr.wikipedia.org/wiki/Vignoble_du_Jura', '2014-05-30 00:00:00 Europe/Paris', '2014-05-30 00:00:00 Europe/Paris'),
('Languedoc', 'grand terroir', NULL, NULL, 'http://fr.wikipedia.org/wiki/Vignoble_du_Languedoc-Roussillon', '2014-05-30 00:00:00 Europe/Paris', '2014-05-30 00:00:00 Europe/Paris'),
('Roussillon', 'grand terroir', NULL, NULL, 'http://fr.wikipedia.org/wiki/Vignoble_du_Languedoc-Roussillon', '2014-05-30 00:00:00 Europe/Paris', '2014-05-30 00:00:00 Europe/Paris'),
('Provence', 'grand terroir', NULL, NULL, 'http://fr.wikipedia.org/wiki/Vignoble_de_Provence', '2014-05-30 00:00:00 Europe/Paris', '2014-05-30 00:00:00 Europe/Paris'),
('Savoie', 'grand terroir', NULL, NULL, 'http://fr.wikipedia.org/wiki/Vignoble_de_Savoie', '2014-05-30 00:00:00 Europe/Paris', '2014-05-30 00:00:00 Europe/Paris'),
('Sud-Ouest', 'grand terroir', NULL, NULL, 'http://fr.wikipedia.org/wiki/Vignoble_du_Sud-Ouest', '2014-05-30 00:00:00 Europe/Paris', '2014-05-30 00:00:00 Europe/Paris'),
('Loire', 'grand terroir', NULL, NULL, 'http://fr.wikipedia.org/wiki/Vignoble_de_la_vall%C3%A9e_de_la_Loire', '2014-05-30 00:00:00 Europe/Paris', '2014-05-30 00:00:00 Europe/Paris'),
('Rhône', 'grand terroir', NULL, NULL, 'http://fr.wikipedia.org/wiki/Vignoble_de_la_vall%C3%A9e_du_Rh%C3%B4ne', '2014-05-30 00:00:00 Europe/Paris', '2014-05-30 00:00:00 Europe/Paris'),
('Bugey', 'terroir de petite taille', NULL, NULL, 'http://fr.wikipedia.org/wiki/Vignoble_du_Bugey', '2014-05-30 00:00:00 Europe/Paris', '2014-05-30 00:00:00 Europe/Paris'),
('Lorraine', 'terroir de petite taille', NULL, NULL, 'http://fr.wikipedia.org/wiki/Vignoble_de_Lorraine', '2014-05-30 00:00:00 Europe/Paris', '2014-05-30 00:00:00 Europe/Paris'),
('Lyonnais', 'terroir de petite taille', NULL, NULL, 'http://fr.wikipedia.org/wiki/Coteaux-du-lyonnais', '2014-05-30 00:00:00 Europe/Paris', '2014-05-30 00:00:00 Europe/Paris'),
('Normandie', 'terroir de petite taille', NULL, NULL, 'http://fr.wikipedia.org/wiki/Vignoble_de_Normandie', '2014-05-30 00:00:00 Europe/Paris', '2014-05-30 00:00:00 Europe/Paris'),
('La Réunion', 'terroir de petite taille', NULL, NULL, 'http://fr.wikipedia.org/wiki/Cilaos_(IGP)', '2014-05-30 00:00:00 Europe/Paris', '2014-05-30 00:00:00 Europe/Paris'),
('Tahiti', 'terroir de petite taille', NULL, NULL, 'http://www.vindetahiti.com/', '2014-05-30 00:00:00 Europe/Paris', '2014-05-30 00:00:00 Europe/Paris'),
('Camargue', 'terroir de petite taille', NULL, NULL, 'http://fr.wikipedia.org/wiki/Viticulture_en_Camargue', '2014-05-30 00:00:00 Europe/Paris', '2014-05-30 00:00:00 Europe/Paris'),
('Île-de-France', 'terroir de petite taille', NULL, NULL, 'http://fr.wikipedia.org/wiki/Vignoble_d%27%C3%8Ele-de-France', '2014-05-30 00:00:00 Europe/Paris', '2014-05-30 00:00:00 Europe/Paris'),
('Limousin', 'terroir disparu', NULL, NULL, 'http://fr.wikipedia.org/wiki/Vignoble_du_Limousin', '2014-05-30 00:00:00 Europe/Paris', '2014-05-30 00:00:00 Europe/Paris'),
('Picardie', 'terroir disparu', NULL, NULL, 'http://fr.wikipedia.org/wiki/Vignoble_de_Picardie', '2014-05-30 00:00:00 Europe/Paris', '2014-05-30 00:00:00 Europe/Paris'),
('Normandie', 'terroir  disparu', NULL, NULL, 'http://fr.wikipedia.org/wiki/Vignoble_de_Normandie', '2014-05-30 00:00:00 Europe/Paris', '2014-05-30 00:00:00 Europe/Paris'),
('Bretagne', 'terroir disparu', NULL, NULL, 'http://fr.wikipedia.org/wiki/Vignoble_de_Bretagne', '2014-05-30 00:00:00 Europe/Paris', '2014-05-30 00:00:00 Europe/Paris'),
('Nord-Pas-de-Calais', 'terroir disparu', NULL, NULL, 'http://fr.wikipedia.org/wiki/Vignoble_du_Nord-Pas-de-Calais', '2014-05-30 00:00:00 Europe/Paris', '2014-05-30 00:00:00 Europe/Paris');

CREATE TABLE openwines.appellation (
  id                SERIAL PRIMARY KEY,
  vignoble_id       INT                 NOT NULL,
  appelation_type   VARCHAR(255)        NOT NULL,
  name              VARCHAR(255)        NOT NULL,
  area              INT                 NULL,
  production        INT                 NULL,
  soil              VARCHAR(255)[]      NULL,
  wine_type         VARCHAR(255)[]      NULL,
  description       TEXT                NULL,
  more              TEXT                NULL,
  created_at        TIMESTAMPTZ         NULL,
  updated_at        TIMESTAMPTZ         NULL
);

COMMENT ON COLUMN openwines.appellation.area IS 'hectares';
COMMENT ON COLUMN openwines.appellation.production IS 'hectoliters';
COMMENT ON COLUMN openwines.appellation.soil IS 'soil types';


