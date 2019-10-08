// import!
import java.util.*;

/** This class is responsible for taking in user information, running that
 *  information through the Client class's calculation methods, and outputting
 *  reports that reflect those calculations. It will instantiate an InputHelper
 *  object to collect user information, put that collected information into
 *  an ArrayList, and run calculations on the results returned from the
 *  Client class to output some totals for the Lawn-A-Thon business as a whole.
 *
 *  @author Elspeth Stalter-Clouse
 */
public class ProcessReports {
    // create an ArrayList to hold Client objects
    private ArrayList<Client> clients;

    // instantiate a new InputHelper object
    InputHelper input = new InputHelper();

    /** This method will ask the user to enter client data
     *  and place each client into the ArrayList of clients
     */
    public void listClients() {
        // instantiate the ArrayList
        clients = new ArrayList<Client>();

        // declare some local variables to temporarily hold client data
        String clientName = "";
        String lawnLengthString = "";
        double lawnLength = 0;
        String lawnWidthString = "";
        double lawnWidth = 0;
        String paymentPlanString = "";
        int paymentPlan = 0;
        Client newClient = null;
        String addClients = "";

        // Start with some precursory information
        System.out.println();
        System.out.println("==================================================");
        System.out.println("=== Welcome To Lawn-A-Thon's Client Processor! ===");
        System.out.println("==================================================");
        System.out.println();

        // Ask the user for information until they enter a "n"
        while (true) {

            newClient = new Client();

            clientName = input.getUserInput("Enter the client's full name:");
            newClient.setClientName(clientName);

            lawnLengthString = input.getUserInput("Enter "
                    + newClient.getClientName()
                    + "\'s lawn length:");
            lawnLength = Double.parseDouble(lawnLengthString);
            newClient.setLawnLength(lawnLength);

            lawnWidthString = input.getUserInput("Enter "
                    + newClient.getClientName()
                    + "\'s lawn width:");
            lawnWidth = Double.parseDouble(lawnWidthString);
            newClient.setLawnWidth(lawnWidth);

            paymentPlanString = input.getUserInput("Which payment method has "
                    + newClient.getClientName() + " selected? Enter \"1\" for "
                    + "a single payment, \"2\" for a double payment, or \"22\" "
                    + "for a weekly payment plan:");
            paymentPlan = Integer.parseInt(paymentPlanString);
            newClient.setPaymentPlan(paymentPlan);

            addClients = input.getUserInput("Would you like to add another new "
                    + "client? Enter \"Y\" if you have more clients to add, or "
                    + "\"N\" if you're finished for now:");

            clients.add(newClient);

            System.out.println();

            if (!addClients.equals("y")) {
                break;
            }
        }
    }

    /** This method will loop through the Client ArrayList and output the
     *  information for each one.
     */
    public void displayClientList() {
        // Start with some precursory information
        System.out.println();
        System.out.println("===========================================");
        System.out.println("==== Lawn-A-Thon's Current Client List ====");
        System.out.println("===========================================");

        // use an enhanced for loop!
        for (Client client : clients) {
            System.out.println();
            System.out.println("Client Name: " + client.getClientName());
            System.out.println("Lawn Area: "
                    + String.format("%,.1f", client.calculateLawnArea())
                    + " square yards");
            System.out.println("Total owed before service charges: $"
                    + String.format("%,.2f", client.calculateSeasonCharge()));
            System.out.println("     *note: clients who have opted to make a single "
                    + "payment for the season will not be charged any "
                    + "extra fees for our services.");
            System.out.println("Preferred Payment Plan: "
                    + client.getPaymentPlan());
            System.out.println("With service charges, each payment will be: $"
                    + String.format("%,.2f", client.calculateServiceCharge()));
            System.out.println(client.getClientName() + "\'s grand total for "
                    + "this season is: $"
                    + String.format("%,.2f", client.calculateTotalCost()));
        }
    }

    /** This method will loop through the Client ArrayList and
     *  return the results of a calculation adding all the clients' lawn
     *  areas together
     *
     *  @return totalSquareYards
     */
    public double calculateTotalSquareYards() {
        // create a local variable to temporarily hold the totalSquareYards
        double totalSquareYards = 0;

        // loop through the ArrayList and add all the lawn areas together
        for (Client client : clients) {
            totalSquareYards = totalSquareYards + client.calculateLawnArea();
        }

        return totalSquareYards;
    }

    /** This method will loop through the Client ArrayList and
     *  return the results of a calculation adding all of the clients'
     *  total owed costs for the season together
     *
     *  @return totalSeasonRevenue
     */
    public double calculateTotalSeasonRevenue() {
        // create a local variable to temporarily hold the totalSeasonRevenue
        double totalSeasonRevenue = 0;

        // loop through the ArrayList and add all the clients'
        // owed costs together
        for (Client client : clients) {
            totalSeasonRevenue = totalSeasonRevenue + client.calculateTotalCost();
        }

        return totalSeasonRevenue;
    }

    /** This method will display all of the calculated totals from the above
     *  methods and output them to the terminal window
     */
    public void displayTotals() {
        System.out.println();
        System.out.println("===============================================");
        System.out.println("==== Lawn-A-Thon's Expected Season Revenue ====");
        System.out.println("===============================================");
        System.out.println();
        System.out.println("Total Number of Clients: " + clients.size());
        System.out.println("Total Square Yards to Mow: "
                + String.format("%,.1f", calculateTotalSquareYards()));
        System.out.println("Total Expected Revenue for the Season: $"
                + String.format("%,.2f", calculateTotalSeasonRevenue()));
        System.out.println();
    }

    /** This method will call all of the other methods in this class. It will
     *  be used in the Launcher to run this program
     */
    public void run() {
        listClients();
        displayClientList();
        displayTotals();
    }
}
