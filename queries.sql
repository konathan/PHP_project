INSERT INTO users (first_name, last_name, email, passcode, user_type) VALUES
('Kon', 'Athan', 'kathanasa@gapps.auth.gr', 'kk', 'admin'),
('Jack', 'Smith', 'jacksmith@mail.com', 'js', 'employee'),
('Samantha', 'Bell', 'kotso.girl@gmail.com', 'sb', 'employee'),
('Eric', 'Jefferson', 'ericjeff@mail.com', 'ej', 'employee'),
('Chloe', 'Matthews', 'chloematt@mail.com', 'cm', 'employee'),
('Elvis', 'Peters', 'elvispeter@mail.com', 'ep', 'employee');


INSERT INTO vacation (date_sub, vac_start, vac_end, days_in_total, reason, app_status, user_id) VALUES
('2020-12-19', '2020-12-25', '2020-12-28', 3, 'Christmas holiday', 'Approved', 3),
('2020-12-20', '2020-12-25', '2020-12-28', 3, 'Christmas holiday', 'Approved', 2),
('2021-12-20', '2021-12-24', '2021-12-27', 3, 'Christmas holiday', 'Rejected', 2),
('2021-01-09', '2021-01-10', '2021-03-01', 50, 'Maternity leave', 'Approved', 3);
