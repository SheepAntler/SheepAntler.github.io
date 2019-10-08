package java111.project5;

/** The CustomerOrder class contains the instance variables pertaining to
 *  orders placed by specific customers. It also contains a single constructor
 *  with parameters to recieve data that matches the instance variables, a
 *  method that will calculate a customer's total order price
 *  (without shipping), and a toString method that returns all this data in
 *  String format.
 *
 *  @author Elspeth Stalter-Clouse
 */
public class CustomerOrder {
    // instance variable declaration
    private String customerName;
    private int customerNumber;
    private String productName;
    private int quantityOrdered;
    private double unitPrice;

    // get all of the private instance variables
    /**
	* Returns value of customerName
	* @return the customer's number
	*/
	public String getCustomerName() {
		return customerName;
	}

	/**
	* Returns value of customerNumber
	* @return the customer's number
	*/
	public int getCustomerNumber() {
		return customerNumber;
	}

	/**
	* Returns value of productName
	* @return the product's name
	*/
	public String getProductName() {
		return productName;
	}

	/**
	* Returns value of quantityOrdered
	* @return the quantity of the item ordered
	*/
	public int getQuantityOrdered() {
		return quantityOrdered;
	}

	/**
	* Returns value of unitPrice
	* @return the price of a single item
	*/
	public double getUnitPrice() {
		return unitPrice;
	}

    /** The default CustomerOrder() constructor
     */
    public CustomerOrder() {

    }

    /** The CustomerOrder constructor sets the customerName, customerNumber,
     *  productName, quantityOrdered, and unitPrice.
     *
     *  @param name customerName
     *  @param number customerNumber
     *  @param product productName
     *  @param quantity quantityOrdered
     *  @param price unitPrice
     */
    public CustomerOrder(String name, int number, String product, int quantity, double price) {
        customerName = name;
        customerNumber = number;
        productName = product;
        quantityOrdered = quantity;
        unitPrice = price;
    }

    /** The calculateTotalOrderPrice() method calculates a customer's total
     *  order price before shipping charges are added.
     *
     *  @return total order cost
     */
    public double calculateTotalOrderPrice() {
        return quantityOrdered * unitPrice;
    }

    /** The toString() method returns a String describing a customer's order.
     *
     *  @return customer order information
     */
    public String toString() {
        return "Customer: " + customerName
                + "\nItem Ordered: " + productName
                + "\nUnit Price: $" + String.format("%,.2f", unitPrice)
                + "\nQuantity Ordered: " + quantityOrdered
                + "\nTotal: $"
                + String.format("%,.2f", calculateTotalOrderPrice());
    }
}
