package java111.project5;

import java.util.*;

/** The ProcessOrders class will create an ArrayList of CustomerOrder and
 *  ProcessShipping objects, set their values via their constructors, and
 *  contain a method that will loop through the ArrayList of orders and
 *  run the appropriate calculations for each one. At the end, each order's
 *  information will be displayed at the command line.
 *
 *  @author Elspeth Stalter-Clouse
 */
public class ProcessOrders {
    // instance variable declaration
    private ArrayList<CustomerOrder> orders;

    /** The run() method calls the createOrders() and displayOrders() methods
     */
    public void run() {
        createOrders();
        displayOrders();
    }

    /** The createOrders() method instantiates some CustomerOrder objects and
     *  some ProcessShipping() objects, sets the values to store in their
     *  instance variables, and adds them to the orders ArrayList.
     */
    public void createOrders() {
        // instantiate the orders ArrayList
        orders = new ArrayList<CustomerOrder>();

        CustomerOrder order1 = new CustomerOrder("Charlie Brown", 1501, "Sprill", 8, 5.99);
        orders.add(order1);

        CustomerOrder order2 = new ProcessShipping("Peppermint Patty", 1509, "Pluff", 2, 11.49, true);
        orders.add(order2);

        CustomerOrder order3 = new ProcessShipping("Schroeder", 1812, "Floink", 9, 9.99, true);
        orders.add(order3);

        CustomerOrder order4 = new CustomerOrder("Pig Pen", 1601, "Sprong", 8, 15.49);
        orders.add(order4);

        CustomerOrder order5 = new ProcessShipping("Snoopy", 1789, "Bleeg", 4, 10.99, true);
        orders.add(order5);

        CustomerOrder order6 = new CustomerOrder("Lucy van Pelt", 1422, "Oon", 7, 3.50);
        orders.add(order6);

        CustomerOrder order7 = new ProcessShipping("Linus van Pelt", 1254, "Mome Rath", 1, 89.99, true);
        orders.add(order7);

        CustomerOrder order8 = new ProcessShipping("Sally Brown", 1599, "Shrieking Shrew", 4, 12.99, true);
        orders.add(order8);

        CustomerOrder order9 = new ProcessShipping("Peter Piper", 1286, "Snorp", 12, 14.49, true);
        orders.add(order9);

        CustomerOrder order10 = new ProcessShipping("Little Miss Muffet", 1999, "Tuffet", 8, 1.99, true);
        orders.add(order10);

        CustomerOrder order11 = new ProcessShipping("Little Boy Blue", 1111, "Horn", 1, 59.99, true);
        orders.add(order11);

        CustomerOrder order12 = new ProcessShipping("Little Jack Horner", 1234, "Plum", 12, 0.55, true);
        orders.add(order12);
    }

    /** The displayOrders() method loops through the orders ArrayList and calls
     *  the calculate and display methods of each order.
     */
    public void displayOrders() {

        for (CustomerOrder order : orders) {
            System.out.println();
            System.out.println(order.toString());
        }
    }
}
