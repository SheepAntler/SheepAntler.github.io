package java111.project5;

/** The ProcessShipping class subclasses the CustomerOrder class. It adds a
 *  single instance variable, and contains a constructor that reflects this
 *  change. It also overrides the calculateTotalOrderPrice() and toString()
 *  methods from its superclass. It also contains constants to help
 *  define the shipping cost and the parameters for each shipping cost
 *  price.
 *
 *  @author Elspeth Stalter-Clouse
 */
public class ProcessShipping extends CustomerOrder {
    // constant declaration
    static final int SMALL_ORDER_LOWER_BOUNDARY = 1;
    static final int SMALL_ORDER_UPPER_BOUNDARY = 3;
    static final int MEDIUM_ORDER_LOWER_BOUNDARY = 4;
    static final int MEDIUM_ORDER_UPPER_BOUNDARY = 6;
    static final int LARGE_ORDER_LOWER_BOUNDARY = 7;
    static final int LARGE_ORDER_UPPER_BOUNDARY = 9;
    static final double SMALL_SHIPPING_COST = 1.50;
    static final double MEDIUM_SHIPPING_COST = 3.00;
    static final double LARGE_SHIPPING_COST = 6.00;
    static final double WHOLESALE_SHIPPING_COST = 7.00;

    // instance variable declaration
    private boolean shippingIndicator;
    private double totalPriceWithShipping;

    /**
     *  Returns value of shippingIndicator
     * @return the shipping indicator boolean
     */
    public boolean getShippingIndicator() {
        return shippingIndicator;
    }

    /** The default ProcessShipping() constructor
     */
    public ProcessShipping() {

    }

    /** The overloaded ProcessShipping constructor calls the CustomerOrder super
     *  constructor and then sets the shippingIndicator boolean for the order.
     *
     *  @param name customerName
     *  @param number customerNumber
     *  @param product productName
     *  @param quantity quantityOrdered
     *  @param price unitPrice
     *  @param shipping shippingIndicator
     */
    public ProcessShipping(String name, int number, String product, int quantity, double price, boolean shipping) {
        super(name, number, product, quantity, price);
        shippingIndicator = shipping;
    }

    /** The calculateTotalOrderPrice() method overrides the
     *  calculateTotalOrderPrice() method in the CustomerOrder superclass.
     *
     *  @return total order cost before shipping
     */
    public double calculateTotalOrderPrice() {
        return super.calculateTotalOrderPrice();
    }

    /** The addShippingCost method is called to add shipping costs to the
     *  overall price of the order from the overriding calculateTotalOrderPrice()
     *  method. It returns a double reflecting the updated price.
     *
     *  @return total order cost with shipping
     */
    public double addShippingCost() {
        // a local variable to temporarily hold the cost with shipping
        double priceWithShipping = 0;

        // determine the shipping cost
        if (getQuantityOrdered() >= SMALL_ORDER_LOWER_BOUNDARY &&
                getQuantityOrdered() <= SMALL_ORDER_UPPER_BOUNDARY) {
            priceWithShipping = super.calculateTotalOrderPrice()
                    + SMALL_SHIPPING_COST;
        } else if (getQuantityOrdered() >= MEDIUM_ORDER_LOWER_BOUNDARY &&
                getQuantityOrdered() <= MEDIUM_ORDER_UPPER_BOUNDARY) {
            priceWithShipping = super.calculateTotalOrderPrice()
                    + MEDIUM_SHIPPING_COST;
        } else if (getQuantityOrdered() >= LARGE_ORDER_LOWER_BOUNDARY &&
                getQuantityOrdered() <= LARGE_ORDER_UPPER_BOUNDARY) {
            priceWithShipping = super.calculateTotalOrderPrice()
                    + LARGE_SHIPPING_COST;
        } else if (getQuantityOrdered() > LARGE_ORDER_UPPER_BOUNDARY) {
            priceWithShipping = super.calculateTotalOrderPrice()
                    + WHOLESALE_SHIPPING_COST;
        }

        return priceWithShipping;
    }

    /** The toString() method overrides the toString() method in the
     *  CustomerOrder superclass, adding the shipping information to the
     *  output String.
     *
     *  @return customer order information including shipping
     */
    public String toString() {
        // a local variable to temporarily hold the output String
        String outputString = "";

        // if a customer spent more than $75 dollars, give them free shipping
        if (super.calculateTotalOrderPrice() > 75) {
            shippingIndicator = false;
        }

        // add the appropriate shipping cost
        if (shippingIndicator == true) {
            if (getQuantityOrdered() >= SMALL_ORDER_LOWER_BOUNDARY &&
                    getQuantityOrdered() <= SMALL_ORDER_UPPER_BOUNDARY) {
                outputString = "Out-of-State " + super.toString()
                        + "\nAdditional Shipping Charges: $"
                        + String.format("%.2f", SMALL_SHIPPING_COST)
                        + "\nGrand Total: $"
                        + String.format("%,.2f", addShippingCost());
            } else if (getQuantityOrdered() >= MEDIUM_ORDER_LOWER_BOUNDARY &&
                    getQuantityOrdered() <= MEDIUM_ORDER_UPPER_BOUNDARY) {
                outputString = "Out-of-State " + super.toString()
                        + "\nAdditional Shipping Charges: $"
                        + String.format("%.2f", MEDIUM_SHIPPING_COST)
                        + "\nGrand Total: $"
                        + String.format("%,.2f", addShippingCost());
            } else if (getQuantityOrdered() >= LARGE_ORDER_LOWER_BOUNDARY &&
                    getQuantityOrdered() <= LARGE_ORDER_UPPER_BOUNDARY) {
                outputString = "Out-of-State " + super.toString()
                        + "\nAdditional Shipping Charges: $"
                        + String.format("%.2f", LARGE_SHIPPING_COST)
                        + "\nGrand Total: $"
                        + String.format("%,.2f", addShippingCost());
            } else if (getQuantityOrdered() > LARGE_ORDER_UPPER_BOUNDARY) {
                outputString = "Out-of-State " + super.toString()
                        + "\nAdditional Shipping Charges: $"
                        + String.format("%.2f", WHOLESALE_SHIPPING_COST)
                        + "\nGrand Total: $"
                        + String.format("%,.2f", addShippingCost());
            }
        } else {
            outputString = "Out-of-State " + super.toString()
                    + "\nOrders over $75 qualify for FREE shipping;"
                    + "\nno shipping charges added!";
        }

        return outputString;
    }
}
