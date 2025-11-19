# Business Management Platform - Development Prompt

## Project Overview

A comprehensive business management dashboard for import/export operations, built with **Laravel**, **Filament**, and **Docker**. The platform manages products, inventory, suppliers, clients, multi-currency wallets, and complete order-to-invoice workflows including transit tracking.

**Primary Use Case**: Importing products from international suppliers (China, Turkey, Dubai) to Algeria, managing stock, and selling to clients with full financial tracking.

---

## Core Entities & Relationships

### 1. **Users**
- Admin (full access)
- Stock Agent (inventory management)
- Role-based permission system
- Multi-language support (English, Arabic - expandable)

### 2. **Wallets**
- Multiple wallets per user/organization
- Each wallet holds currency-specific funds
- Currency types: USD, EUR, DZD, CNY, AED, etc.
- Track total balance per wallet
- Transaction history per wallet

### 3. **Products**
- Product name, photo/image
- Country of origin (China, Turkey, Dubai, etc.)
- Unit price
- Category
- SKU/Code

### 4. **Clients**
- Client information
- Contact details
- Can be assigned to orders or added during order creation
- Purchase history tracking

### 5. **Suppliers/Fournisseurs**
- Supplier details
- Products supplied
- Payment terms

### 6. **Orders/Transits** (Core workflow)
- Status: Pending → In Transit → Received → Confirmed
- Order details:
  - Product(s) selected
  - Quantity ordered
  - Total price
  - Price per unit (calculated)
  - Country of origin
  - Expected delivery date (optional)
  - Transit duration
  - Assigned client (optional)
  - Payment wallet selected

### 7. **Stock/Inventory**
- Stock hub locations (Algeria, other hubs - expandable)
- Quantity available per product
- Updates when transit is received
- Warehouse management

### 8. **Transit Receipts**
- Quantity received vs. quantity expected
- Discrepancies recorded (missing items)
- Loss calculation: (Price per unit) × (Missing quantity)
- Loss/damage records per transit

### 9. **Invoices**
- Generated when:
  - Transit received with client assigned
  - Stock agent creates manual invoice for sales
- Invoice details:
  - Products sold
  - Quantity given
  - Unit price
  - Total amount
  - Client information
  - Date generated
- Status: Pending → Confirmed → Printed
- Printable format

---

## Business Processes

### **Process 1: Import Order with Client Assignment**

1. **Admin creates new Order** (Wizard format):
   - **Step 1**: Select product
     - Choose existing product OR add new product
     - If new: enter name, photo, country, total price, quantity
     - System calculates price per unit
   
   - **Step 2**: Transit details
     - Country of origin
     - Expected quantity
     - Expected delivery date (optional)
     - Select client (existing or create new)
   
   - **Step 3**: Payment selection
     - Choose wallet to deduct amount from
     - Wallet currency validation
   
   - **Step 4**: Confirmation
     - Review all details
     - Create order (Status: **Pending**)

2. **Transit received at destination** (Algeria):
   - Status changes: **Pending → Received**
   - Stock agent logs quantity received
   - System compares with expected quantity
   - Calculate losses:
     - If expected: 100 units, received: 97 units
     - Loss: (Price per unit) × 3
     - Record loss in **Loss/Damage table**
   - Stock quantity updated
   - If client assigned → **Invoice created (Pending)**

3. **Client takes products** (Stock agent confirms):
   - Stock agent writes actual quantity given
   - Confirm invoice
   - Print invoice
   - Stock quantity decreases

---

### **Process 2: Import Order Without Client Assignment**

1. Admin creates order (same as Process 1, but no client selected)
2. Transit received → Stock updated (Status: **Received**)
3. Later, when clients request products:
   - Stock agent creates new invoice
   - Selects product(s) from available stock
   - Enters quantity to sell
   - Enters selling price
   - Confirms → Stock decreases
   - System calculates per-product pricing
   - Print invoice

---

### **Process 3: Direct Sales from Existing Stock**

- Stock agent can create invoice directly from existing inventory
- No order/transit involved
- Select product → enter quantity → enter price → confirm
- Stock decreases immediately

---

## Dashboard Requirements

### **Main Dashboard (Statistics View)**
1. **Wallet Summary**
   - Total balance across all wallets
   - Balance per wallet (grouped by currency)
   - Currency breakdown
   - Recent transactions per wallet

2. **Inventory Summary**
   - Total number of products
   - Total quantity in stock
   - Low stock alerts (configurable threshold)
   - Stock value (quantity × unit price)

3. **Orders/Transits Summary**
   - Total active transits (Pending + In Transit)
   - Received transits (this month/all time)
   - Pending confirmations
   - Total transit value

4. **Financial Overview**
   - Total sales (invoices confirmed)
   - Total losses/damage (transit discrepancies)
   - Profit margin
   - Revenue trend (chart)

5. **Charts & Visualizations**
   - Revenue trend (monthly/weekly)
   - Top products by sales
   - Inventory levels
   - Wallet balance distribution

---

## Wizard-Based Order Creation

The order creation should follow a **multi-step wizard** approach:

```
Step 1: Product Selection
├─ Choose existing product
└─ OR Add new product
   ├─ Name
   ├─ Photo/Image
   ├─ Country of origin
   ├─ Quantity
   └─ Total price → (System calculates price per unit)

Step 2: Transit Details
├─ Country of origin
├─ Expected quantity
├─ Expected delivery date (optional)
└─ Assigned client (optional)
   ├─ Select existing client
   └─ OR Create new client

Step 3: Payment Method
├─ Select wallet
├─ Currency validation
└─ Confirm amount deduction

Step 4: Review & Confirm
├─ Review all details
├─ Create order
└─ Order status: PENDING
```

---

## Release Plan

### **Release 1: Core Foundation**
**Goal**: Basic structure and user authentication

- [ ] User authentication & login
- [ ] User roles (Admin, Stock Agent)
- [ ] Basic role-based permissions
- [ ] User management (create, edit, delete users)
- [ ] Settings page (basic configurations)
- [ ] Multi-language support infrastructure (English/Arabic)
- [ ] Dark/Light theme toggle
- [ ] Basic navigation & layout

**Deliverable**: Functional login, user management, basic dashboard layout

---

### **Release 2: Wallet & Product Management**
**Goal**: Manage wallets and products

- [ ] Wallet management (CRUD)
  - [ ] Add wallet with currency
  - [ ] Edit wallet details
  - [ ] View wallet balance
  - [ ] Transaction history per wallet
- [ ] Product management (CRUD)
  - [ ] Add new products (name, photo, country, price)
  - [ ] Edit products
  - [ ] View product list
  - [ ] Product categories (optional in R2)
- [ ] Client management (CRUD)
  - [ ] Add new clients
  - [ ] Edit client details
  - [ ] View client list
  - [ ] Client contact information
- [ ] Supplier/Fournisseur management (CRUD)

**Deliverable**: Full wallet and product management; ready for orders

---

### **Release 3: Order Management & Transit Tracking**
**Goal**: Complete order workflow with inventory integration

- [ ] Order creation wizard
  - [ ] Step 1: Product selection (existing/new)
  - [ ] Step 2: Transit details
  - [ ] Step 3: Payment wallet selection
  - [ ] Step 4: Review & confirmation
- [ ] Order status management (Pending → Received → Confirmed)
- [ ] Stock management
  - [ ] Stock hub creation (Algeria, others)
  - [ ] Stock creation and updates
  - [ ] Stock levels by hub
- [ ] Transit receipt workflow
  - [ ] Log received quantity
  - [ ] Calculate discrepancies/losses
  - [ ] Record loss in database
  - [ ] Auto-create pending invoice (if client assigned)
- [ ] Inventory updates on transit receipt

**Deliverable**: Complete order-to-stock workflow functioning end-to-end

---

### **Release 4: Invoicing & Dashboard Analytics**
**Goal**: Complete financial tracking and comprehensive dashboards

- [ ] Invoice management
  - [ ] Auto-generated invoices (from transits with clients)
  - [ ] Manual invoice creation (stock agent sales)
  - [ ] Invoice status (Pending → Confirmed → Printed)
  - [ ] Invoice printing functionality
  - [ ] Invoice history
- [ ] Main dashboard with statistics
  - [ ] Wallet summary (balance, currencies)
  - [ ] Inventory summary
  - [ ] Active/received transits count
  - [ ] Financial overview (sales, losses, profit)
  - [ ] Charts and visualizations
- [ ] Advanced reporting
  - [ ] Sales report
  - [ ] Loss/damage report
  - [ ] Stock report
  - [ ] Revenue trends
- [ ] Multi-language full implementation
  - [ ] All UI text in English/Arabic
  - [ ] Language switcher
  - [ ] RTL support for Arabic
- [ ] Advanced theme customization

**Deliverable**: Complete platform with analytics and reporting

---

## Technical Stack

- **Backend**: Laravel 11+
- **Admin Panel**: Filament 3+
- **Containerization**: Docker & Docker Compose
- **Database**: MySQL/MariaDB
- **Frontend**: Blade Templates + Alpine.js (Filament integrated)
- **Languages**: PHP, JavaScript
- **Multi-language**: Laravel Localization
- **Authentication**: Laravel Sanctum/Fortify
- **File Storage**: Laravel Storage

---

## Design & UX Requirements

### **Theme**
- **Default**: Dark theme
- **Alternative**: Light/White theme
- **Toggle**: User preference saved
- **Framework**: Tailwind CSS (Filament default)

### **Languages**
- **Primary**: English (Release 4 start)
- **Secondary**: Arabic (Release 4)
- **RTL Support**: For Arabic text
- **Language Switcher**: Top right navigation

### **Responsive Design**
- Mobile-friendly
- Tablet optimized
- Desktop optimized

---

## Permission & Role Management

### **Roles**
1. **Super Admin**
   - Full access to all features
   - User management
   - System settings
   - All reports

2. **Admin**
   - Order management
   - Wallet management
   - Product management
   - Client management
   - View reports

3. **Stock Agent**
   - View inventory
   - Receive transits
   - Create invoices
   - Update stock
   - View own invoices

4. **View-Only User** (optional)
   - View-only access to products, clients, orders
   - View reports

### **Granular Permissions**
- Create orders
- Edit orders
- Delete orders
- Create invoices
- Create users
- Manage wallets
- Manage products
- Manage clients
- View reports
- Export reports
- Manage roles

---

## Data Tables & Relationships

```
users
├─ id, name, email, password, role, created_at

roles
├─ id, name, description

permissions
├─ id, name, description

wallets
├─ id, user_id, currency, balance, created_at

products
├─ id, name, photo_path, country_origin, price_per_unit, category_id, created_at

clients
├─ id, name, phone, email, address, created_at

suppliers
├─ id, name, phone, email, contact_person, created_at

orders (transits)
├─ id, product_id, quantity_expected, total_price, country_origin, client_id, wallet_id, delivery_date_expected, status (pending/in_transit/received/confirmed), created_at

transit_receipts
├─ id, order_id, quantity_received, discrepancies, created_at

losses
├─ id, order_id, product_id, quantity_missing, loss_amount, created_at

stock
├─ id, product_id, stock_hub_id, quantity, created_at, updated_at

stock_hubs
├─ id, name, location, created_at

invoices
├─ id, client_id, order_id (optional), total_amount, status (pending/confirmed/printed), created_at

invoice_items
├─ id, invoice_id, product_id, quantity, unit_price, total_price

transactions
├─ id, wallet_id, type (debit/credit), amount, description, created_at
```

---

## Success Criteria

By **Release 4 completion**, the platform should:

✅ Manage complete import/export workflow  
✅ Track inventory across multiple hubs  
✅ Handle multi-currency wallets  
✅ Generate professional invoices  
✅ Provide comprehensive dashboards & analytics  
✅ Support Arabic/English languages  
✅ Offer dark/light themes  
✅ Enforce role-based access control  
✅ Be fully containerized with Docker  
✅ Be production-ready  

---

## Development Notes

- Use **Filament** for rapid admin panel development
- Implement **incremental releases** to show client progress
- Each release should be deployable and testable
- Focus on **UX** in wizard flows
- Ensure **data integrity** in financial transactions
- Plan for **scalability** (support thousands of products, orders, clients)
- Document **API** for potential mobile app in future
- Use **Docker Compose** for local development environment

---

## Questions for Clarification (Optional)

1. Should orders automatically transition through statuses or require manual confirmation?
2. Should there be approval workflow for large orders/transactions?
3. Do you need audit logs for all transactions?
4. Should clients have a portal to view their invoices/orders?
5. Future integration with payment gateways needed?
6. Email notifications for order status updates?