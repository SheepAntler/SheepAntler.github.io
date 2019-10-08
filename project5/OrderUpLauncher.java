package java111.project5;

/** The OrderUpLauncher class instantiates a ProcessOrders object and calls
 *  its run() method. It contains the main method for the Order Up application.
 *
 *  @author Elspeth Stalter-Clouse
 */
public class OrderUpLauncher {
    /** Here is the main method, which will output some precursory information
     *  and then call the main method on the ProcessOrders object it
     *  instantiates.
     *
     *  @param args command line arguments -- not used here
     */
    public static void main(String[] args) {
        // instantiate a ProcessOrders object
        ProcessOrders orderUp = new ProcessOrders();

        // output some precursory information
        System.out.println();
        System.out.println("=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+");
        System.out.println("=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+");
        System.out.println("=+=+=                          =+=+=");
        System.out.println("=+=+=   WELCOME TO ORDER UP!   =+=+=");
        System.out.println("=+=+=    YOUR ONE-STOP SHOP    =+=+=");
        System.out.println("=+=+=   FOR FAST AND PRECISE   =+=+=");
        System.out.println("=+=+=     ORDER SUMMARIES!     =+=+=");
        System.out.println("=+=+=                          =+=+=");
        System.out.println("=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+");
        System.out.println("=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+");
        System.out.println();
        System.out.println("Ahoy there! Here are your current order printouts."
                + "\nIf we've done our job well, you won't encounter any"
                + "\nunexpected names or numbers; however, if you think"
                + "\nsomething's not quite right, give us a call at "
                + "1-800-FIX-MEUP\nand we'll check it out. If we made a "
                + "misteak (ha-ha/eyeroll),\nyour order is on us!");

        // run the program
        orderUp.run();
    }
}
