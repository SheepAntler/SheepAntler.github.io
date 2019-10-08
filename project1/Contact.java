/** This is a class representing a contact object.
 *
 * @author Elspeth Stalter-Clouse
 *
 */
public class Contact {
    // Instance variables/attributes
    String firstName;
    String lastName;
    String address;
    String phone;
    String email;

    /** Display the contact information to the page
     *
     */
    public void display() {
        System.out.println("Name: " + firstName + " " + lastName);
        System.out.println("Address: " + address);
        System.out.println("Phone: " + phone);
        System.out.println("Email: " + email);
        System.out.println("");
    }
}
