CREATE TABLE IF NOT EXISTS openwines.vignoble (
  id                INT PRIMARY KEY     NOT NULL,
  name              VARCHAR(255)        NULL,
  description       TEXT                NULL,
  departments       INT[]               NULL,
  area              INT                 NULL,
  more              TEXT                NULL,
  created_at        TIMESTAMPTZ         NOT NULL,
  updated_at        TIMESTAMPTZ         NOT NULL
);

COMMENT ON COLUMN openwines.vignoble.area IS 'hectares';

CREATE TABLE IF NOT EXISTS openwines.appellation (
  id                INT PRIMARY KEY     NOT NULL,
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


