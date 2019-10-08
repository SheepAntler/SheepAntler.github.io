/** Create contact objects and test them by calling the display method.
 *
 * @author Elspeth Stalter-Clouse
 */

public class ContactTestDrive {

    /** Instantiate a contact object
     *  and call the display method on it to test import junit.framework.TestCase;
     *
     * @param args command line arguments
     */
    public static void main(String[] args) {

        // Instantiate a contact object and assign them to the appropriate variables
        Contact contact1 = new Contact();
        Contact contact2 = new Contact();

        // Set some details on the first contact object
        contact1.firstName = "Cindy Lou";
        contact1.lastName = "Who";
        contact1.address = "123 ABC Lane, Whoville, Winter Wonderland 56789";
        contact1.phone = "221-464-7476";
        contact1.email = "clouwho@whyareyoutakingmychristmastree.com";

        // Set some details on the second contact object
        contact2.firstName = "Sir Arthur";
        contact2.lastName = "McMonkey McBean";
        contact2.address = "54 South Sneech Beach, Land of the Sneeches, 44321";
        contact2.phone = "123-456-7890";
        contact2.email = "get_stars@mcmonkeymcbeancorp.com";

        // Call the display method on the contact1 object
        contact1.display();
        contact2.display();

    }
}
