CREATE TABLE IF NOT EXISTS seo_setting (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    title TEXT NOT NULL DEFAULT 'Night Desktop',
    prefix_sub_title TEXT NOT NULL DEFAULT ' | ',
    suffix_sub_title TEXT NOT NULL DEFAULT '',
    description TEXT NOT NULL DEFAULT 'A simple and beautiful night desktop',
    keywords TEXT NOT NULL DEFAULT 'night, desktop, simple, beautiful',
    author TEXT NOT NULL DEFAULT '9OwL',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);