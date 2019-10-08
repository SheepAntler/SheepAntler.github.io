/** This is the Employee class, which will contain private instance variables,
 *  get/set methods for each one, and a display() method that returns a String
 *  containing information about each employee.
 *
 *  @author Elspeth Stalter-Clouse
 */
public class Employee {
    // declare private variables to hold employee information
    private String firstName;
    private String lastName;
    private int employeeId;
    private String department;

    // set-and-get!
    /** set the firstName
     *  @param firstName
     */
    public void setFirstName(String firstName) {
        this.firstName = firstName;
    }

    /** get the firstName
     *  @return firstName
     */
    public String getFirstName() {
        return firstName;
    }

    /** set the lastName
     *  @param lastName
     */
    public void setLastName(String lastName) {
        this.lastName = lastName;
    }

    /** get the lastName
     *  @return lastName
     */
    public String getLastName() {
        return lastName;
    }

    /** set the employeeId
     *  @param employeeId
     */
    public void setEmployeeId(int employeeId) {
        this.employeeId = employeeId;
    }

    /** get the employeeId
     *  @return employeeId
     */
    public int getEmployeeId() {
        return employeeId;
    }

    /** set department
     *  @param department
     */
    public void setDepartment(String department) {
        this.department = department;
    }

    /** get department
     *  @return department
     */
    public String getDepartment() {
        return department;
    }

    /** This is the display() method, which will return a string.
     *  @return employee information string
     */
    public String display() {
        String employeeInformation = getFirstName() + " " + getLastName()
                + " works in " + getDepartment() + " and has employee ID number "
                + getEmployeeId() + ".";
        // return this to the calling method
        return employeeInformation;
    }
}
