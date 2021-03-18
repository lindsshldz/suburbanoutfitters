-- Initial inserts for testing. Data for inventory, orders/lines, payments, shipping should come from web app)

INSERT INTO `admin account` (`Admin ID`, `Store ID`, `first name`, `last name`, `Email`, `password`) VALUES
(1, 1, 'Lindsay', 'Shields', 'u0528339@utah.edu', 'pass123'),
(2, 1, 'Cristina', 'Cendjas', 'u1234@utah.edu', 'pass456'),
(3, 1, 'Smith', 'Mainoo', 'u5678@utah.edu', 'pass789');

INSERT INTO `customer account` (`Customer ID`, `First Name`, `Last Name`, `Email`, `Password`, `Phone Number`) VALUES
(1, 'Britt', 'Calvimonte', 'bcalvi@xyz.com', 'cust123', '(801)555-1234')
(2, 'Jane', 'Doe', 'jane@abc.com', 'cust456', '(435)111-2222'),
(3, 'Troy', 'Shields', 'tls@email.com', 'cust789', '(858)585-8585');

INSERT INTO `products` (`Product ID`, `Product Name`, `Sell Price`, `Product Description`, `SKU`, `Category`, `Tags`, `Img Path`) VALUES
(1, 'Red Shirt', 25, 'Soft t-shirt in a deep-red made with 100% cotton', '0123123', 'Shirts', 'Casual', 'img\redshirt.png' ),
(2, 'Blue Shirt', 25, 'Soft t-shirt in a deep-blue made with 100% cotton', '0234234', 'Shirts', 'Casual', 'img\blueshirt.png' ),
(3, 'Purple Pants', 50, 'Professional chinos in a vibrant purple', '0345345', 'Pants', 'Professional', 'img\purplepants.png' ),
(4, 'Green Pants', 50, 'Professional chinos in a classic green', '0456456', 'Pants', 'Professional', 'img\greenpants.png' ),
(5, 'Brown Shoes', 75, 'Comfortable and stylish shoes in brown leather', '0567567', 'Shoes', 'Casual', 'img\brownshoes.png' ),
(6, 'Pink Shoes', 75, 'Comfortable and stylish tennis shoes in soft pink', '0678678', 'Shoes', 'Athletic', 'img\pinkshoes.png' );

INSERT INTO `stores` (`Store ID`, `Store Name`, `Store Location`, `City`, `State`, `Zip`) VALUES
(1, 'Online', 'Online', 'n/a', 'n/a', 'n/a'),
(2, 'SLC Downtown', 'City Creek Mall', 'Salt Lake City', 'UT', '84000');