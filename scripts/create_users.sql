USE gestionca;

INSERT INTO roles ('role_id', 'role', 'description', 'created_at', 'updated_at') VALUES
(1, 'administrador', 'Tiene permisos de lectura, escritura y edición', '2023-11-11 04:52:41', '2023-11-11 04:52:41'),
(2, 'editor', 'Tiene permisos de lectura, escritura y edición pero con algunas restricciones', '2023-11-11 04:55:59', '2023-11-11 04:55:59'),
(3, 'lector', 'Solo tiene permisos de lectura', '2023-11-11 04:56:41', '2023-11-11 04:56:41');

INSERT INTO roles ('user_id', 'name', 'surnames', 'email', 'phone', 'password', 'remember_token', 'role', 'created_at', 'updated_at') VALUES
('e423f25d-8061-11ee-aa43-0242ac120002', 'Gestion', 'CA', 'gestionca@hotmail.com', '5512345678', '$2y$12$JcbmYjpqheQykywf1wV7C.VfzfCycyBnis10zOpMHWLJh4683GyNi', null, 1, '2023-11-11 07:14:02', '2023-11-11 07:14:02');
