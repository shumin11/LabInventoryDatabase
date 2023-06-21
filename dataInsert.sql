drop table Items;

drop table ItemUnit;

drop table Chemicals;

drop table Equipments;

drop table Keep;

drop table Cabinet_In;

drop table Room;

drop table Use;

drop table LabMembers;

drop table Involve;

drop table Lab;

drop table LabManager;

drop table Chemical_Waste_Dispose;

drop table Vendors;

drop table Purchase;

CREATE TABLE Items (
    CatalogNumber INTEGER PRIMARY KEY,
    FullName CHAR(20),
    Description CHAR(100),
    Quantity INTEGER,
    Type CHAR(20)
);

grant
select
    on Items to public;

CREATE TABLE ItemUnit (Full Name CHAR(20) PRIMARY KEY, Unit CHAR(20));

grant
select
    on ItemUnit to public;

CREATE TABLE Chemicals (
    CatalogNumber INTEGER PRIMARY KEY,
    ExpiryDate DATE
);

grant
select
    on Chemicals to public;

CREATE TABLE Equipments (
    CatalogNumber INTEGER PRIMARY KEY,
    MaintenanceFrequency CHAR(20)
);

grant
select
    on Equipments to public;

CREATE TABLE Keep (
    ShelfID INTEGER Number INTEGER,
    BuildingName CHAR(20),
    CatalogNumber INTEGER,
    Date DATE,
    PRIMARY KEY (ShelfID, Number, BuildingName, CatalogNumber),
    FOREIGN KEY (SelfID, Number, BuildingName) REFERENCES Cabinet_In(ShelfID, Number, BuildingName),
    FOREIGN KEY (CatalogNumber) REFERENCES Items(CatalogNumber)
);

grant
select
    on Keep to public;

CREATE TABLE Cabinet_In (
    ShelfID INTEGER,
    Number INTEGER,
    BuildingName char(20),
    PRIMARY KEY (ShelfID, Number, BuildingName),
    FOREIGN KEY (Number, BuildingName) REFERENCES Room(Number, BuildingName)
);

grant
select
    on Cabinet_In to public;

CREATE TABLE Room (
    Number INTEGER,
    BuildingName char(20),
    PRIMARY KEY (Number, BuildingName)
);

grant
select
    on Room to public;

CREATE TABLE Use (
    CatalogNumber INTEGER,
    UserID char(20),
    Date DATE,
    PRIMARY KEY (CatalogNumber, UserID),
    FOREIGN KEY (CatalogNumber) REFERENCES Items(CatalogNumber),
    FOREIGN KEY (UserID) REFERENCES Lab members(UserID)
);

grant
select
    on Use to public;

CREATE TABLE LabMembers (
    UserID char(20) PRIMARY KEY,
    Name char(20),
    Email char(20),
    Phone char(20)
);

grant
select
    on LabMembers to public;

CREATE TABLE Involve (
    UserID char(20),
    ID INTEGER,
    EnrollDate DATE,
    PRIMARY KEY (UserID, ID),
    FOREIGN KEY (UserID) REFERENCES Lab member(UserID),
    FOREIGN KEY (ID) REFERENCES Lab(ID)
);

grant
select
    on Involve to public;

CREATE TABLE Lab (
    ID INTEGER PRIMARY KEY,
    Name char(20),
    Address char(50)
);

grant
select
    on Lab to public;

CREATE TABLE LabManager (
    AdminID INTEGER PRIMARY KEY,
    Name char(20),
    Email char(20),
    Phone char(20),
    ID INTEGER,
    FOREIGN KEY (ID) REFERENCES Lab(ID)
);

grant
select
    on LabManager to public;

CREATE TABLE Chemical_Waste_Dispose(
    ID INTEGER PRIMARY KEY,
    Name char(20),
    Description char(200),
    AdminID INTEGER,
    Date DATE,
    FOREIGN KEY (AdminID) REFERENCES Lab Manager(AdminID)
);

grant
select
    on Chemical_Waste_Dispose to public;

CREATE TABLE Vendors (
    Name char(20),
    Email char(20),
    Address char(50),
    Phone char(20),
    PRIMARY KEY (Name, Address)
);

grant
select
    on Vendors to public;

CREATE TABLE Purchase (
    CatalogNumber INTEGER,
    AdminID INTEGER,
    Name char(20),
    Address char(50),
    Date DATE,
    UnitPrice INTEGER,
    PRIMARY KEY (CatalogNumber, AdminID, Name, Address),
    FOREIGN KEY (CatalogNumber) REFERENCES Items(CatalogNumber),
    FOREIGN KEY (AdminID) REFERENCES Lab Manager(AdminID),
    FOREIGN KEY (Name, Address) REFERENCES Vendor(Name, Address)
);

grant
select
    on Purchase to public;

INSERT INTO
    Items (
        CatalogNumber,
        FullName,
        Description,
        Quantity,
        Type
    )
VALUES
    (
        1001,
        'Chemical A',
        'Organic compound used for experiments',
        20,
        'Chemical'
    ),
    (
        1002,
        'Chemical B',
        'Inorganic salt for laboratory use',
        50,
        'Chemical'
    ),
    (
        1003,
        'Equipment A',
        'Microscope with high-resolution optics',
        5,
        'Equipment'
    ),
    (
        1004,
        'Equipment B',
        'Centrifuge for sample separation',
        2,
        'Equipment'
    ),
    (
        1005,
        'Glassware A',
        'Glass beakers for various volumes',
        30,
        'Equipment'
    );

INSERT INTO
    ItemUnit (FullName, Units)
VALUES
    ('Chemical A', 'grams'),
    ('Chemical B', 'grams'),
    ('Equipment A', 'units'),
    ('Equipment B', 'units'),
    ('Glassware A', 'pieces');

INSERT INTO
    Chemicals (CatalogNumber, ExpiryDate)
VALUES
    (1001, '2024-12-31'),
    (1002, '2023-09-15');

INSERT INTO
    Equipments (CatalogNumber, MaintenanceFrequency)
VALUES
    (1003, 'Monthly'),
    (1004, 'Quarterly'),
    (1005, 'Annual');

INSERT INTO
    Keep (
        ShelfID,
        Number,
        BuildingName,
        CatalogNumber,
        Date
    )
VALUES
    (1, 1, 'Building A', 1001, '2023-06-01'),
    (2, 3, 'Building B', 1002, '2023-06-02');

INSERT INTO
    Cabinet_In (ShelfID, Number, BuildingName)
VALUES
    (1, 1, 'Building A'),
    (2, 2, 'Building B'),
    (3, 1, 'Building C'),
    (2, 3, 'Building B'),
    (1, 2, 'Building A');

INSERT INTO
    Room (Number, BuildingName)
VALUES
    (1, 'Building A'),
    (2, 'Building B'),
    (3, 'Building C'),
    (4, 'Building D'),
    (5, 'Building E');

INSERT INTO
    Use (CatalogNumber, UserID, Date)
VALUES
    (1001, 'user1', '2023-06-03'),
    (1002, 'user2', '2023-06-04'),
    (1003, 'user3', '2023-06-05'),
    (1004, 'user4', '2023-06-06'),
    (1005, 'user5', '2023-06-07');

INSERT INTO
    LabMembers (UserID, Name, Email, Phone)
VALUES
    (
        'user1',
        'John Smith',
        'john.smith@example.com',
        '123-456-7890'
    ),
    (
        'user2',
        'Sam Doe',
        'sam.doe@example.com',
        '234-567-8901'
    ),
    (
        'user3',
        'Robert Johnson',
        'robert.johnson@example.com',
        '345-678-9012'
    ),
    (
        'user4',
        'Emily Wilson',
        'emily.wilson@example.com',
        '456-789-0123'
    ),
    (
        'user5',
        'Michael Brown',
        'michael.brown@example.com',
        '567-890-1234'
    );

INSERT INTO
    Involve (UserID, ID, EnrollDate)
VALUES
    ('user1', 1, '2022-01-01'),
    ('user2', 1, '2022-02-15'),
    ('user3', 2, '2022-03-10'),
    ('user4', 2, '2022-04-20'),
    ('user5', 3, '2022-05-05');

INSERT INTO
    Lab (ID, Name, Address)
VALUES
    (1, 'Lab 1', 'Building A, Floor 1'),
    (2, 'Lab 2', 'Building B, Floor 2'),
    (3, 'Lab 3', 'Building C, Floor 3'),
    (4, 'Lab 4', 'Building D, Floor 4'),
    (5, 'Lab 5', 'Building E, Floor 5');

INSERT INTO
    LabManager (AdminID, Name, Email, Phone, ID)
VALUES
    (
        'admin1',
        'Jane Doe',
        'jane.doe@example.com',
        '987-654-3210',
        1
    ),
    (
        'admin2',
        'Mark Johnson',
        'mark.johnson@example.com',
        '456-789-1230',
        2
    ),
    (
        'admin3',
        'Emily Smith',
        'emily.smith@example.com',
        '789-123-4560',
        3
    ),
    (
        'admin4',
        'Michael Brown',
        'michael.brown@example.com',
        '321-654-9870',
        4
    ),
    (
        'admin5',
        'Sophia Davis',
        'sophia.davis@example.com',
        '654-321-9870',
        5
    );

INSERT INTO
    Chemical_Waste_Dispose (Name, ID, Description, AdminID, Date)
VALUES
    (
        'Waste A',
        1,
        'Hazardous waste from experiments',
        'admin1',
        '2023-06-04'
    ),
    (
        'Waste B',
        2,
        'Chemical waste for proper disposal',
        'admin2',
        '2023-06-05'
    ),
    (
        'Waste C',
        3,
        'Expired chemicals for safe disposal',
        'admin3',
        '2023-06-06'
    ),
    (
        'Waste D',
        4,
        'Biohazard waste from biological experiments',
        'admin4',
        '2023-06-07'
    ),
    (
        'Waste E',
        5,
        'Toxic waste for specialized treatment',
        'admin5',
        '2023-06-08'
    );

INSERT INTO
    Vendors (Name, Email, Address, Phone)
VALUES
    (
        'QIAGEN',
        'vendorA@example.com',
        '123 Main Street',
        '111-111-1111'
    ),
    (
        'SIGMA',
        'vendorB@example.com',
        '456 Elm Street',
        '222-222-2222'
    ),
    (
        'VWR',
        'vendorC@example.com',
        '789 Oak Street',
        '333-333-3333'
    ),
    (
        'INVITROGEN',
        'vendorD@example.com',
        '321 Pine Street',
        '444-444-4444'
    );

INSERT INTO
    Purchase (
        CatalogNumber,
        AdminID,
        Name,
        Address,
        Date,
        UnitPrice
    )
VALUES
    (
        1001,
        'admin1',
        'QIAGEN',
        '123 Main Street',
        '2023-06-01',
        10
    ),
    (
        1001,
        'admin2',
        'SIGMA',
        '456 Elm Street',
        '2023-06-02',
        15
    ),
    (
        1002,
        'admin3',
        'QIAGEN',
        '123 Main Street',
        '2023-06-03',
        20
    ),
    (
        1002,
        'admin5',
        'SIGMA',
        '456 Elm Street',
        '2023-06-04',
        25
    ),
    (
        1003,
        'admin4',
        'QIAGEN',
        '123 Main Street',
        '2023-06-05',
        30
    ),
    (
        1004,
        'admin4',
        'QIAGEN',
        '123 Main Street',
        '2023-06-01',
        10
    ),
    (
        1004,
        'admin5',
        'INVITROGEN',
        '321 Pine Street',
        '2023-06-02',
        15
    ),
    (
        1005,
        'admin1',
        'QIAGEN',
        '123 Main Street',
        '2023-06-20',
        20
    ),
    (
        1005,
        'admin2',
        'INVITROGEN',
        '321 Pine Street',
        '2023-06-20',
        25
    ),
    (
        1005,
        'admin3',
        'VWR',
        '789 Oak Street',
        '2023-06-20',
        30
    ),
    (
        1005,
        'admin1',
        'SIGMA',
        '456 Elm Street',
        '2023-06-20',
        20
    );