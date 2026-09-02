<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AttackSimulationRoot extends Entity implements Parsable 
{
    /**
     * @var array<EndUserNotification>|null $endUserNotifications Represents an end user's notification for an attack simulation training.
    */
    private ?array $endUserNotifications = null;
    
    /**
     * @var array<LandingPage>|null $landingPages Represents an attack simulation training landing page.
    */
    private ?array $landingPages = null;
    
    /**
     * @var array<LoginPage>|null $loginPages Represents an attack simulation training login page.
    */
    private ?array $loginPages = null;
    
    /**
     * @var array<AttackSimulationOperation>|null $operations Represents an attack simulation training operation.
    */
    private ?array $operations = null;
    
    /**
     * @var array<Payload>|null $payloads Represents an attack simulation training campaign payload in a tenant.
    */
    private ?array $payloads = null;
    
    /**
     * @var array<SimulationAutomation>|null $simulationAutomations Represents simulation automation created to run on a tenant.
    */
    private ?array $simulationAutomations = null;
    
    /**
     * @var array<Simulation>|null $simulations Represents an attack simulation training campaign in a tenant.
    */
    private ?array $simulations = null;
    
    /**
     * @var array<Training>|null $trainings Represents details about attack simulation trainings.
    */
    private ?array $trainings = null;
    
    /**
     * Instantiates a new AttackSimulationRoot and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AttackSimulationRoot
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AttackSimulationRoot {
        return new AttackSimulationRoot();
    }

    /**
     * Gets the endUserNotifications property value. Represents an end user's notification for an attack simulation training.
     * @return array<EndUserNotification>|null
    */
    public function getEndUserNotifications(): ?array {
        return $this->endUserNotifications;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'endUserNotifications' => fn(ParseNode $n) => $o->setEndUserNotifications($n->getCollectionOfObjectValues([EndUserNotification::class, 'createFromDiscriminatorValue'])),
            'landingPages' => fn(ParseNode $n) => $o->setLandingPages($n->getCollectionOfObjectValues([LandingPage::class, 'createFromDiscriminatorValue'])),
            'loginPages' => fn(ParseNode $n) => $o->setLoginPages($n->getCollectionOfObjectValues([LoginPage::class, 'createFromDiscriminatorValue'])),
            'operations' => fn(ParseNode $n) => $o->setOperations($n->getCollectionOfObjectValues([AttackSimulationOperation::class, 'createFromDiscriminatorValue'])),
            'payloads' => fn(ParseNode $n) => $o->setPayloads($n->getCollectionOfObjectValues([Payload::class, 'createFromDiscriminatorValue'])),
            'simulationAutomations' => fn(ParseNode $n) => $o->setSimulationAutomations($n->getCollectionOfObjectValues([SimulationAutomation::class, 'createFromDiscriminatorValue'])),
            'simulations' => fn(ParseNode $n) => $o->setSimulations($n->getCollectionOfObjectValues([Simulation::class, 'createFromDiscriminatorValue'])),
            'trainings' => fn(ParseNode $n) => $o->setTrainings($n->getCollectionOfObjectValues([Training::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the landingPages property value. Represents an attack simulation training landing page.
     * @return array<LandingPage>|null
    */
    public function getLandingPages(): ?array {
        return $this->landingPages;
    }

    /**
     * Gets the loginPages property value. Represents an attack simulation training login page.
     * @return array<LoginPage>|null
    */
    public function getLoginPages(): ?array {
        return $this->loginPages;
    }

    /**
     * Gets the operations property value. Represents an attack simulation training operation.
     * @return array<AttackSimulationOperation>|null
    */
    public function getOperations(): ?array {
        return $this->operations;
    }

    /**
     * Gets the payloads property value. Represents an attack simulation training campaign payload in a tenant.
     * @return array<Payload>|null
    */
    public function getPayloads(): ?array {
        return $this->payloads;
    }

    /**
     * Gets the simulationAutomations property value. Represents simulation automation created to run on a tenant.
     * @return array<SimulationAutomation>|null
    */
    public function getSimulationAutomations(): ?array {
        return $this->simulationAutomations;
    }

    /**
     * Gets the simulations property value. Represents an attack simulation training campaign in a tenant.
     * @return array<Simulation>|null
    */
    public function getSimulations(): ?array {
        return $this->simulations;
    }

    /**
     * Gets the trainings property value. Represents details about attack simulation trainings.
     * @return array<Training>|null
    */
    public function getTrainings(): ?array {
        return $this->trainings;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('endUserNotifications', $this->getEndUserNotifications());
        $writer->writeCollectionOfObjectValues('landingPages', $this->getLandingPages());
        $writer->writeCollectionOfObjectValues('loginPages', $this->getLoginPages());
        $writer->writeCollectionOfObjectValues('operations', $this->getOperations());
        $writer->writeCollectionOfObjectValues('payloads', $this->getPayloads());
        $writer->writeCollectionOfObjectValues('simulationAutomations', $this->getSimulationAutomations());
        $writer->writeCollectionOfObjectValues('simulations', $this->getSimulations());
        $writer->writeCollectionOfObjectValues('trainings', $this->getTrainings());
    }

    /**
     * Sets the endUserNotifications property value. Represents an end user's notification for an attack simulation training.
     * @param array<EndUserNotification>|null $value Value to set for the endUserNotifications property.
    */
    public function setEndUserNotifications(?array $value): void {
        $this->endUserNotifications = $value;
    }

    /**
     * Sets the landingPages property value. Represents an attack simulation training landing page.
     * @param array<LandingPage>|null $value Value to set for the landingPages property.
    */
    public function setLandingPages(?array $value): void {
        $this->landingPages = $value;
    }

    /**
     * Sets the loginPages property value. Represents an attack simulation training login page.
     * @param array<LoginPage>|null $value Value to set for the loginPages property.
    */
    public function setLoginPages(?array $value): void {
        $this->loginPages = $value;
    }

    /**
     * Sets the operations property value. Represents an attack simulation training operation.
     * @param array<AttackSimulationOperation>|null $value Value to set for the operations property.
    */
    public function setOperations(?array $value): void {
        $this->operations = $value;
    }

    /**
     * Sets the payloads property value. Represents an attack simulation training campaign payload in a tenant.
     * @param array<Payload>|null $value Value to set for the payloads property.
    */
    public function setPayloads(?array $value): void {
        $this->payloads = $value;
    }

    /**
     * Sets the simulationAutomations property value. Represents simulation automation created to run on a tenant.
     * @param array<SimulationAutomation>|null $value Value to set for the simulationAutomations property.
    */
    public function setSimulationAutomations(?array $value): void {
        $this->simulationAutomations = $value;
    }

    /**
     * Sets the simulations property value. Represents an attack simulation training campaign in a tenant.
     * @param array<Simulation>|null $value Value to set for the simulations property.
    */
    public function setSimulations(?array $value): void {
        $this->simulations = $value;
    }

    /**
     * Sets the trainings property value. Represents details about attack simulation trainings.
     * @param array<Training>|null $value Value to set for the trainings property.
    */
    public function setTrainings(?array $value): void {
        $this->trainings = $value;
    }

}
