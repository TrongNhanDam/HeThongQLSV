create database devNhanQTDL character set UTF8 collate utf8_vietnamese_ci;

use devNhanQTDL;

create table adminGV (
    adminId int auto_increment primary key,
    adminName varchar(255),
    adminEmail varchar(255),
    adminUser varchar(255),
    adminPass varchar(255),
    level int(30)
);

insert into
    adminGV (
        adminName,
        adminEmail,
        adminUser,
        adminPass,
        level
    )
values
    (
        'TrongNhan',
        'nhanb1910113@student.ctu.edu.vn',
        'NhanAdmin',
        '7820eda6b13d1572ebb928b8b8b4daef',
        0
    );

create table khoa(
    maKhoa char(8) primary key,
    tenKhoa varchar(50) NOT NULL
);

create table lop(
    maLop char(8) primary key,
    tenLop varchar(50) NOT NULL,
    maKhoa char(8) NOT NULL,
    foreign key (maKhoa) references khoa (maKhoa)
);

create table sinhVien(
    mssv char(8) primary key,
    hoTen varchar(45) NOT NULL,
    gioiTinh char(1) NOT NULL,
    noiSinh varchar(40) DEFAULT 'Vietnam',
    diaChi varchar(100) NOT NULL,
    maLop char(8),
    maKhoa char(8),
    foreign key (maKhoa) references khoa(maKhoa),
    foreign key (maLop) references lop(maLop)
);

create table hocPhan(
    maHP char(6) primary key,
    tenHP varchar(50) NOT NULL,
    soTinChi int,
    soTietLT int,
    soTietTH int
);

create table ketQua(
    mssv char(8) NOT NULL,
    maHP char(6) NOT NULL,
    diem float NOT NULL,
    primary key (mssv, maHP),
    foreign key (mssv) references sinhVien(mssv),
    foreign key (maHP) references hocPhan(maHP)
);

-- Insert Khoa 
insert into
    khoa
values
    ('kt', 'Kinh tế');

insert into
    khoa
values
    ('cntt&tt', 'Công nghệ thông tin và truyền thông');

insert into
    khoa
values
    ('khtn', 'Khoa học tự nhiên');

insert into
    khoa
values
    ('khxh', 'Khoa học xã hội');

insert into
    khoa
values
    ('sp', 'Sư phạm');

-- Insert Lớp CNTT
insert into
    lop
values
    ('DI19V7A6', 'Công nghệ thông tin', 'cntt&tt');

insert into
    lop
values
    ('DI19Y1A4', 'Khoa học máy tính', 'cntt&tt');

insert into
    lop
values
    ('DI19B6A3', 'Kỹ thuật phần mềm', 'cntt&tt');

insert into
    lop
values
    ('DI19Z1A2', 'Tin học ứng dụng', 'cntt&tt');

-- Insert lớp Sư phạm
insert into
    lop
values
    ('SP1910A1', 'Sư phạm sinh học', 'sp');

insert into
    lop
values
    ('SP19X3A1', 'Sư phạm lịch sử', 'sp');

-- Insert lớp KHTN
insert into
    lop
values
    ('TN1984A2', 'Hóa học', 'khtn');

-- Insert lớp KT
insert into
    lop
values
    ('KT19W3A2', 'Kinh doanh quốc tế', 'kt');

insert into
    lop
values
    ('KT1920A1', 'Quản trị kinh doanh', 'kt');

-- Insert lớp Xã hội
insert into
    lop
values
    ('XH19U4A1', 'Xã hội học', 'khxh');

insert into
    lop
values
    ('XH19W7A1', 'Văn học', 'khxh');

-- Insert lớp học phần 
insert into
    hocPhan
values
    ('CT101', 'Lập trình căn bản', '4', '30', '60');

insert into
    hocPhan
values
    (
        'CT176',
        'Lập trình Hướng đối tượng',
        '3',
        '30',
        '30'
    );

insert into
    hocPhan
values
    (
        'CT467',
        'Quản trị dữ liệu',
        '3',
        '30',
        '30'
    );

insert into
    hocPhan
values
    (
        'CT275',
        'Công nghệ web',
        '3',
        '30',
        '30'
    );

insert into
    hocPhan
values
    (
        'CT555',
        'Phát triển ứng dụng web web',
        '3',
        '30',
        '30'
    );

insert into
    hocPhan
values
    (
        'CT237',
        'Nguyên lý Hệ điều hành',
        '3',
        '30',
        '30'
    );

insert into
    hocPhan
values
    (
        'TN010',
        'Xác suất thống kê',
        '3',
        '60',
        '0'
    );

insert into
    hocPhan
values
    ('TN001', 'Vi tích phân A1', '3', '45', '0');

insert into
    hocPhan
values
    ('TN112', 'Đại số tuyến tính', '4', '60', '0');

insert into
    hocPhan
values
    ('CT203', 'Toán rời rạc', '4', '60', '0');

-- Insert sinh viên
insert into
    sinhVien
values
    (
        'B1910113',
        'Đàm Trọng Nhân',
        'M',
        'Hậu Giang',
        'ktx khu B, ĐHCT, Q. Ninh Kiều, TPCT',
        'DI19V7A6',
        'cntt&tt'
    );

insert into
    sinhVien
values
    (
        'B1910114',
        'Nguyễn Hữu Nhân',
        'M',
        'An Giang',
        'ktx khu a, ĐHCT, Q. Ninh Kiều, TPCT',
        'DI19V7A6',
        'cntt&tt'
    );

insert into
    sinhVien
values
    (
        'B1910205',
        'Lê Hoàng Song Duy',
        'M',
        'Bạc Liêu',
        'nhà trọ, Nguyễn Văn Cừ, Q. Ninh Kiều, TPCT',
        'DI19Y1A4',
        'cntt&tt'
    );

insert into
    sinhVien
values
    (
        'B1910119',
        'Lê Diệp Tuyết Như',
        'F',
        'Sóc Trăng',
        '332, Nguyễn Văn Linh, Q. Ninh Kiều, TPCT',
        'DI19V7A6',
        'sp'
    );

insert into
    sinhVien
values
    (
        'B1910203',
        'Trần Minh Thư',
        'F',
        'Cần Thơ',
        '123, bến Ninh Kiều, Q. Ninh Kiều, TPCT',
        'XH19U4A1',
        'cntt&tt'
    );

insert into
    sinhVien
values
    (
        'B1910202',
        'Ngô Huỳnh Ngân',
        'F',
        'Vĩnh Long',
        '80, Nguyễn Trãi, Q. Ninh Kiều, TPCT',
        'DI19Y1A4',
        'cntt&tt'
    );

insert into
    sinhVien
values
    (
        'B1910201',
        'Nguyễn Nhật Khang',
        'M',
        'Cần Thơ',
        '80, Hưng Phú, Q. Ninh Kiều, TPCT',
        'DI19Z1A2',
        'cntt&tt'
    );

insert into
    sinhVien
values
    (
        'B1910200',
        'Đỗ Ngọc Yên Bình',
        'M',
        'Cần Thơ',
        '50, Nguyễn Văn Cừ, Q. Ninh Kiều, TPCT',
        'DI19B6A3',
        'cntt&tt'
    );

-- Insert Kết quả
insert into
    ketQua
values
    ('B1910113', 'CT101', 8);

insert into
    ketQua
values
    ('B1910113', 'TN010', 10);

insert into
    ketQua
values
    ('B1910113', 'CT275', 10);

insert into
    ketQua
values
    ('B1910113', 'CT467', 10);

insert into
    ketQua
values
    ('B1910113', 'CT176', 7);

insert into
    ketQua
values
    ('B1910114', 'CT203', 10);

insert into
    ketQua
values
    ('B1910114', 'CT176', 9);

insert into
    ketQua
values
    ('B1910205', 'TN010', 8);

insert into
    ketQua
values
    ('B1910119', 'CT101', 8);

insert into
    ketQua
values
    ('B1910119', 'CT176', 8);

insert into
    ketQua
values
    ('B1910203', 'CT101', 9);

insert into
    ketQua
values
    ('B1910203', 'CT176', 7);

insert into
    ketQua
values
    ('B1910202', 'CT555', 8);

insert into
    ketQua
values
    ('B1910202', 'CT101', 1);

insert into
    ketQua
values
    ('B1910201', 'CT555', 7);

insert into
    ketQua
values
    ('B1910201', 'CT101', 7);

insert into
    ketQua
values
    ('B1910200', 'CT275', 9);

-- function, procedure
DELIMITER $ $ -- 1
CREATE PROCEDURE ThemSV(
    mssv char(11),
    hoTen varchar(30),
    gioiTinh char(1),
    noiSinh varchar(40),
    diaChi varchar(100),
    tenLop varchar(50),
    tenKhoa varchar(50)
) BEGIN
insert into
    sinhvien
values
    (
        mssv,
        hoTen,
        gioiTinh,
        noiSinh,
        diaChi,
        (
            select
                maLop
            from
                lop
            where
                lop.tenLop = tenLop
        ),
        (
            select
                maKhoa
            from
                khoa
            where
                khoa.tenKhoa = tenKhoa
        )
    );

END $ $ -- 2
CREATE PROCEDURE XoaSV(mssv char(11)) BEGIN IF EXISTS (
    SELECT
        mssv
    FROM
        sinhvien s
    WHERE
        s.mssv = mssv
) THEN
DELETE FROM
    ketqua
WHERE
    ketqua.mssv = mssv;

DELETE FROM
    sinhvien
WHERE
    sinhvien.mssv = mssv;

END IF;

END $ $ -- 3
CREATE PROCEDURE NhapDiem(_mssv char(8), _maHP varchar(6), _diem int) BEGIN
insert into
    ketqua (mssv, maHP, diem)
values
    (_mssv, _maHP, _diem);

END $ $ -- 4
CREATE PROCEDURE ThemHP(
    maHP char(6),
    tenHP varchar(50),
    soTinChi int,
    soTietLT int,
    soTietTH int
) BEGIN
insert into
    hocphan
values
    (maHP, tenHP, soTinChi, soTietLT, soTietTH);

END $ $ -- 5
CREATE PROCEDURE ThemKhoa(maKhoa char(8), tenKhoa varchar(50)) BEGIN
insert into
    khoa
values
    (maKhoa, tenKhoa);

END $ $ -- 6
CREATE FUNCTION fnDiemTB(mssv char(11)) returns double BEGIN declare kq double;

set
    kq = -1;

if exists (
    select
        mssv
    from
        ketqua k
    where
        k.mssv = mssv
) then
SELECT
    sum(diem * soTinChi) / sum(soTinChi) into kq
FROM
    ketqua k
    inner join hocphan h ON k.maHP = h.maHP
WHERE
    k.mssv = mssv;

end if;

return kq;

END $ $ -- 7
CREATE PROCEDURE DiemTB (mssv char(11)) BEGIN
SELECT
    mssv,
    hoTen,
    gioiTinh,
    diaChi,
    maKhoa,
    fnDiemTB(mssv) as diemTB
FROM
    sinhvien s
WHERE
    s.mssv = mssv;

END $ $ -- 8
CREATE PROCEDURE BangDiemTB(maKhoa char(8)) BEGIN
SELECT
    *,
    fnDiemTB(mssv) as diemTB
FROM
    sinhvien
    inner join khoa on khoa.maKhoa = sinhvien.maKhoa
WHERE
    khoa.maKhoa = maKhoa;

END $ $ -- 9
CREATE PROCEDURE SuaSV(
    _mssv char(11),
    _hoTen varchar(30),
    _gioiTinh char(1),
    _noiSinh varchar(40),
    _diaChi varchar(100),
    _tenLop varchar(50),
    _tenKhoa varchar(50)
) BEGIN
UPDATE
    sinhvien
set
    hoTen = _hoTen,
    gioiTinh = _gioiTinh,
    noiSinh = _noiSinh,
    diaChi = _diaChi,
    maLop = (
        select
            maLop
        from
            lop
        where
            lop.tenLop = _tenLop
    ),
    maKhoa = (
        select
            maKhoa
        from
            khoa
        where
            khoa.tenKhoa = _tenKhoa
    )
where
    mssv = _mssv;

END $ $ -- 10
CREATE PROCEDURE ThemLop(
    maLop char(8),
    tenLop varchar(50),
    tenKhoa varchar(50)
) BEGIN
insert into
    lop
values
    (
        maLop,
        tenLop,
        (
            select
                maKhoa
            from
                khoa
            where
                khoa.tenKhoa = tenKhoa
        )
    );

END $ $ -- Call if Pro Select if FUN