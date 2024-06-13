<?php
class Ticket
{
    public $id;
    public $name = '';
    public $issue = '';
    public $staffid= null;
    public $status = '';
    public $created_at;

    private $db = null;

    public function __construct($data = null)
    {
        $this->title = isset($data['title']) ? $data['title'] : null;
        $this->body = isset($data['body']) ? $data['body'] : null;
        $this->requester = isset($data['requester']) ? $data['requester'] : null;
        $this->team = isset($data['team']) ? $data['team'] : null;
        $this->team_member = isset($data['team_member']) ? $data['team_member'] : null;
        $this->status = isset($data['status']) ? $data['status'] : 'open';
        $this->priority = isset($data['priority']) ? $data['priority'] : 'low';

        $this->db = Database::getInstance();
    }

    public function save(): Ticket
    {
        $sql = "INSERT INTO ticket (title, body, requester, team, team_member, status, priority, created_at)
                VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ssiisss', $this->title, $this->body, $this->requester, $this->team, $this->team_member, $this->status, $this->priority);

        if ($stmt->execute() === false) {
            throw new Exception($stmt->error);
        }

        $this->id = $stmt->insert_id;
        return $this;
    }

    public static function find($id): ?Ticket
    {
        $self = new static();
        $sql = "SELECT * FROM ticket WHERE id = ?";
        $stmt = $self->db->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows < 1) {
            return null;
        }

        $self->populateObject($result->fetch_object());
        return $self;
    }

    public static function findAll(): array
    {
        $self = new static();
        $sql = "SELECT * FROM ticket ORDER BY id DESC";
        $result = $self->db->query($sql);

        $tickets = [];
        while ($row = $result->fetch_object()) {
            $ticket = new static();
            $ticket->populateObject($row);
            $tickets[] = $ticket;
        }

        return $tickets;
    }

    public static function findByStatus($status): array
    {
        $self = new static();
        $sql = "SELECT * FROM ticket WHERE status = ? ORDER BY id DESC";
        $stmt = $self->db->prepare($sql);
        $stmt->bind_param('s', $status);
        $stmt->execute();
        $result = $stmt->get_result();

        $tickets = [];
        while ($row = $result->fetch_object()) {
            $ticket = new static();
            $ticket->populateObject($row);
            $tickets[] = $ticket;
        }

        return $tickets;
    }

    public static function changeStatus($id, $status): bool
    {
        $self = new static();
        $sql = "UPDATE ticket SET status = ? WHERE id = ?";
        $stmt = $self->db->prepare($sql);
        $stmt->bind_param('si', $status, $id);
        return $stmt->execute();
    }

    public static function delete($id): bool
    {
        $self = new static();
        $sql = "DELETE FROM ticket WHERE id = ?";
        $stmt = $self->db->prepare($sql);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

    public static function setRating($id, $rating): bool
    {
        $self = new static();
        $sql = "UPDATE ticket SET rating = ? WHERE id = ?";
        $stmt = $self->db->prepare($sql);
        $stmt->bind_param('si', $rating, $id);
        return $stmt->execute();
    }

    public static function setPriority($id, $priority): bool
    {
        $self = new static();
        $sql = "UPDATE ticket SET priority = ? WHERE id = ?";
        $stmt = $self->db->prepare($sql);
        $stmt->bind_param('si', $priority, $id);
        return $stmt->execute();
    }

    public function displayStatusBadge(): string
    {
        $badgeType = '';
        switch ($this->status) {
            case 'open':
                $badgeType = 'danger';
                break;
            case 'pending':
                $badgeType = 'warning';
                break;
            case 'solved':
                $badgeType = 'success';
                break;
            case 'closed':
                $badgeType = 'info';
                break;
        }

        return '<div class="badge badge-' . $badgeType . '" role="badge"> ' . ucfirst($this->status) . '</div>';
    }

    public function populateObject($object): void
    {
        foreach ($object as $key => $property) {
            $this->$key = $property;
        }
    }

    public function update($id): Ticket
    {
        $sql = "UPDATE ticket SET team_member = ?, title = ?, body = ?, requester = ?, team = ?, status = ?, priority = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ssiisssi', $this->team_member, $this->title, $this->body, $this->requester, $this->team, $this->status, $this->priority, $id);

        if ($stmt->execute() === false) {
            throw new Exception($stmt->error);
        }

        return self::find($id);
    }

    public function unassigned(): array
    {
        $self = new static();
        $sql = "SELECT * FROM ticket WHERE team_member IS NULL ORDER BY id DESC";
        $result = $self->db->query($sql);

        $tickets = [];
        while ($row = $result->fetch_object()) {
            $ticket = new static();
            $ticket->populateObject($row);
            $tickets[] = $ticket;
        }

        return $tickets;
    }

    public static function findByMember($member): array
    {
        $self = new static();
        $sql = "SELECT * FROM ticket WHERE team_member = ? ORDER BY id DESC";
        $stmt = $self->db->prepare($sql);
        $stmt->bind_param('s', $member);
        $stmt->execute();
        $result = $stmt->get_result();

        $tickets = [];
        while ($row = $result->fetch_object()) {
            $ticket = new static();
            $ticket->populateObject($row);
            $tickets[] = $ticket;
        }

        return $tickets;
    }
}
?>
